<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoppingCart; // Ensure you have the correct model
use Illuminate\Support\Facades\Auth;
use App\Traits\Apptraits;
use App\Models\addresses;
use App\Models\orderItems;
use App\Models\orders;
use App\Models\payments;
use App\Models\discountCodes;
use App\Rules\ValidPromoCode;
use App\Models\Cities;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminOrderNotificationMail;



class CheckoutController extends Controller
{
    /**
     * Show the checkout address form with cart summary.
     *
     * @return \Illuminate\View\View
     */
    use Apptraits;

    public $addressModel = 'App\Models\addresses';
    public $orderModel = 'App\Models\orders';

    public function index()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = shoppingCart::with('product', 'productItems') // assuming a 'product' relation exists
            ->where('user_id', Auth::id())
            ->get();

        // Calculate total price
        $subtotal = $cartItems->sum(function ($item) {
            return ($item->product->price - ($item->product->price * $item->product->sale / 100)) * $item->quantity;
        });
        $total = $subtotal;

        // Return the checkout view with the necessary data
        return view('checkout.address', compact('cartItems', 'subtotal',  'total'));
    }
    public function order(Request $request)
    {
        $validatedData = $request->validate([
            'full_name'     => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city'          => 'required|string|max:100',
            'state'         => 'required|string|max:100',
            'postal_code'   => 'required|digits_between:4,10',
            'country'       => 'required|string|max:100',
            'phone_number'  => 'required|numeric|digits_between:10,15',
            'promo_code'    => ['nullable', 'string', 'max:50', new ValidPromoCode],
        ]);

        $promoCode = $validatedData['promo_code'] ?? null;

        // Prepare the attributes and values for updating/creating address
        $addressAttributes = [
            'user_id' => Auth::id()
        ];

        $addressValues = $request->all();
        $addressValues['user_id'] = Auth::id();
        unset($addressValues['_token']); // Remove CSRF token

        // Fetch the promo code details from the DiscountCodes model
        $promoCodeValue = DiscountCodes::where('code', $promoCode)->first();

        // Fetch the city based on the provided city ID
        $city = Cities::where('id', $validatedData['city'])->first();

        // Update or create the user's address
        self::updateOrCreate($this->addressModel, $addressAttributes, $addressValues);

        // Initialize ShoppingCart instance and calculate the total price
        $shoppingCart = new ShoppingCart();
        $totalPrice = $shoppingCart->totalPrice(Auth::id(), $city->price, $promoCodeValue->discount_percentage ?? 0);

        // Prepare order data
        $orderValues = [
            'user_id'      => Auth::id(),
            'total_amount' => $totalPrice, // Null safe handling for discount_percentage
            'status'       => 'pending',
            'discount_code_id' => $promoCodeValue->id ?? null, // If no promoCodeValue, use null
            'city_id' => $city->id
        ];

        // Define the order attributes, including a placeholder ID value for new order creation
        $orderAttributes = ['id' => ''];

        // Create or update the order
        $order = self::updateOrCreate($this->orderModel, $orderAttributes, $orderValues);

        // Retrieve the created/updated order along with related data





        // Add items from the shopping cart to the order
        $order->addOrderItems(Auth::id());

        // Create payment record
        payments::createCashPayment($order->id, $totalPrice);

        // Return success message
        $orderID = $order->id;
        $deleveryFees = $city->price;

        $order = orders::with([
            'user',
            'user.address',            // Load the user related to the order
            'discountCodes',           // Load the discount codes related to the order
            'cities',                  // Load the city related to the order
            'orderItems.product',      // Load products for each order item
            'orderItems.productItems', // Load sizes for each order item
            'payments'                 // Load all payments related to the order
        ])->findOrFail($order->id);


        // Generate PDF
        $pdf = Pdf::loadView('pdf.invoice', ['order' => $order]);

        // Define the directory path for saving the PDF
        $invoiceDirectory = storage_path('app/public/invoices');

        // Check if the directory exists, and create it if it doesn't
        if (!is_dir($invoiceDirectory)) {
            mkdir($invoiceDirectory, 0775, true);  // Create the directory with proper permissions
        }

        // Save the PDF to the specified path
        $pdfPath = $invoiceDirectory . '/invoice_' . $order->id . '.pdf';
        $pdf->save($pdfPath);

        // Send Email with the invoice PDF path
        Mail::to($order->user->email)->send(new OrderConfirmationMail($order, $pdfPath));

        $adminEmail = 'jaysbasicc@gmail.com'; // Replace with the admin's email
        Mail::to($adminEmail)->send(new AdminOrderNotificationMail($order, $pdfPath));



        // Return a view with the order details
        return view('checkout.receipt', compact('orderID', 'totalPrice', 'deleveryFees'));
    }
}

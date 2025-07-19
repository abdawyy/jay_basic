<?php

namespace App\Http\Controllers;

use App\Models\shoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\productItems;
use App\Traits\Apptraits;



class CartController extends Controller
{

    use Apptraits;

    public $model='App\Models\shoppingCart';
public function add(Request $request)
{
    if (!auth()->check()) {
        return response()->json([
            'success' => false,
            'message' => 'You need to be logged in to add products to the cart.',
            'redirect' => route('login')
        ], 401);
    }

    // Validate the request
    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'size_id'    => 'required|integer|exists:product_items,id',
        'quantity'   => 'required|integer|min:1',
    ]);

    $userId = auth()->id();

    try {
        // Get product item stock
        $productItem = productItems::where('id', $request->size_id)
            ->where('products_id', $request->product_id)
            ->first();

        if (!$productItem) {
            return response()->json([
                'success' => false,
                'message' => 'Product size not found.'
            ], 404);
        }

        $availableStock = $productItem->quantity;

        // Get existing quantity in cart
        $existingCartItem = ShoppingCart::where('user_id', $userId)
            ->where('products_id', $request->product_id)
            ->where('size_id', $request->size_id)
            ->first();

        $existingQuantity = $existingCartItem ? $existingCartItem->quantity : 0;
        $requestedQuantity = $request->quantity;

        // Total quantity after adding
        $newTotalQuantity = $existingQuantity + $requestedQuantity;

        if ($newTotalQuantity > $availableStock) {
            $productName = optional($productItem->product)->name ?? 'Product';

            return response()->json([
                'success' => false,
                'message' => "Cannot add more than available stock for: {$productName}. Only {$availableStock} left in stock.",
            ], 400); // Bad Request
        }

        // Update or create cart item
        if ($existingCartItem) {
            $existingCartItem->quantity = $newTotalQuantity;
            $existingCartItem->save();
            $message = 'Product quantity updated successfully.';
        } else {
            ShoppingCart::create([
                'user_id'     => $userId,
                'products_id' => $request->product_id,
                'size_id'     => $request->size_id,
                'quantity'    => $requestedQuantity,
            ]);
            $message = 'Product added to cart successfully.';
        }

        $cartCount = ShoppingCart::where('user_id', $userId)->count();

        return response()->json([
            'success'   => true,
            'message'   => $message,
            'cartCount' => $cartCount
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while adding the product to the cart. Please try again.',
            'error'   => $e->getMessage()
        ], 500);
    }
}

    public function index()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = shoppingCart::with('product', 'productItems') // assuming a 'product' relation exists
            ->where('user_id', Auth::id())
            ->get();

        // Calculate total price
        $subtotal = $cartItems->sum(function ($item) {
            return ( $item->product->price - ($item->product->price *$item->product->sale / 100) ) * $item->quantity;
        });
        $total = $subtotal ;

        return view('cart.index', compact('cartItems', 'subtotal',  'total'));
    }


    public function delete($id)
    {
        // Call the deleteRecord function from the trait
        $isDeleted = self::deleteRecord($this->model, $id);

        // Handle the flash message based on the result
        if ($isDeleted) {
            // Success flash message
            return redirect()->back()->with('success', 'your item deleted successfully.');
        } else {
            // Failure flash message
            return redirect()->back()->with('error', 'Failed to delete your item');
        }
    }
}

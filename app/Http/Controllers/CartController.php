<?php

namespace App\Http\Controllers;

use App\Models\shoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Apptraits;



class CartController extends Controller
{

    use Apptraits;

    public $model='App\Models\shoppingCart';

    public function add(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'You need to be logged in to add products to the cart.',
                'redirect' => route('login') // Redirect to the login page
            ], 401); // 401 Unauthorized response
        }

        // Validate the request
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'size_id' => 'required|integer|exists:product_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the authenticated user ID
        $userId = auth()->id();

        try {
            // Check if the product is already in the cart for this user (same size)
            $existingCartItem = ShoppingCart::where('user_id', $userId)
                ->where('products_id', $request->product_id)
                ->where('size_id', $request->size_id)
                ->first();

            if ($existingCartItem) {
                // If the product exists, update the quantity
                $existingCartItem->quantity += $request->quantity;
                $existingCartItem->save();
                $message = 'Product quantity updated successfully';
            } else {
                // Add a new product to the cart
                ShoppingCart::create([
                    'user_id' => $userId,
                    'products_id' => $request->product_id,
                    'size_id' => $request->size_id,
                    'quantity' => $request->quantity,
                ]);
                $message = 'Product added to cart successfully';
            }

            // Get the updated cart count for the user
            $cartCount = ShoppingCart::where('user_id', $userId)->count();

            // Return a success response with the updated cart count
            return response()->json([
                'success' => true,
                'message' => $message,
                'cartCount' => $cartCount // Include cart count in response
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and return an error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the product to the cart. Please try again.',
                'error' => $e->getMessage()
            ], 500); // Internal server error
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

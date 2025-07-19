<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Apptraits;
use Illuminate\Support\Facades\DB;


class orders extends Model
{
    use Apptraits;
    use HasFactory;
    protected $fillable = [
       'user_id',
       'total_amount',
       'status',
       'discount_code_id',
       'city_id'




    ];
    protected $table = 'orders';


      // Optionally, specify default values for attributes
      protected $attributes = [
        'status' => 'pending', // You can set a default status if needed
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }
    public function discountCodes(){
        return $this->belongsTo(discountCodes::class , 'discount_code_id');

    }
    public function cities(){
        return $this->belongsTo(Cities::class , 'city_id');

    }
    public function orderDiscounts(){
        return $this->hasMany(orderDiscounts::class);

    }
    public function orderItems(){
        return $this->hasMany(orderItems::class , 'orders_id');

    }
    public function payments(){
        return $this->hasMany(payments::class , 'orders_id');

    }
    public function addOrderItems($userId)
    {
        DB::beginTransaction(); // Start a database transaction for safe operations

        try {
            // 1. Retrieve cart items by user ID
            $cartItems = ShoppingCart::getCartItemsByUserId($userId);

            if ($cartItems->isEmpty()) {
                // Throw an exception if the cart is empty
                throw new \Exception('Cart is empty.');
            }

            // 2. Loop through the cart items and create OrderItems
            foreach ($cartItems as $cartItem) {
                // Find the corresponding product item by products_id and size_id
                $productItem = productItems::where('products_id', $cartItem->products_id)
                    ->where('id', $cartItem->size_id)
                    ->first();

                // if (!$productItem || $productItem->quantity < 1) {
                //     throw new \Exception(
                //         'Insufficient stock for product ID: ' . $cartItem->products_id .
                //         ', Size ID: ' . $cartItem->size_id
                //     );
                // }

                // Decrement the quantity by 1
                // $productItem->decrement('quantity', 1);

                // Create the order item
                orderItems::create([
                    'orders_id'   => $this->id, // Use the current order's ID
                    'products_id' => $cartItem->products_id,
                    'quantity'    => $cartItem->quantity,
                    'size'     => $productItem->size,
                    'price' => ($cartItem->product->price - ($cartItem->product->price * ($cartItem->product->sale / 100))) * $cartItem->quantity,
                ]);
            }

            // 3. Empty the shopping cart for the given user
            ShoppingCart::where('user_id', $userId)->delete();

            DB::commit(); // Commit the transaction if everything is fine

            // Return true for success
            return true;

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of any error

            // Optionally rethrow the exception for handling in the controller
            throw new \Exception('Failed to add order items: ' . $e->getMessage());
        }
    }

}

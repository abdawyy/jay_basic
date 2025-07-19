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
    DB::beginTransaction(); // Start a database transaction

    try {
        // 1. Retrieve cart items by user ID
        $cartItems = ShoppingCart::getCartItemsByUserId($userId);

        if ($cartItems->isEmpty()) {
            // Return failure response
            return [
                'success' => false,
                'message' => 'Cart is empty.'
            ];
        }

        // 2. Loop through the cart items and create OrderItems
        foreach ($cartItems as $cartItem) {
            $productItem = productItems::where('products_id', $cartItem->products_id)
                ->where('id', $cartItem->size_id)
                ->first();

            // Optional stock check
            // if (!$productItem || $productItem->quantity < 1) {
            //     return [
            //         'success' => false,
            //         'message' => 'Insufficient stock for product ID: ' . $cartItem->products_id
            //     ];
            // }
                        // Calculate updated quantity ensuring it doesn’t go below 0
            $newQuantity = max(0, $productItem->quantity - $cartItem->quantity);

            // Update stock
            $productItem->quantity = $newQuantity;
            $productItem->save();

            // Create order item
            orderItems::create([
                'orders_id'   => $this->id,
                'products_id' => $cartItem->products_id,
                'quantity'    => $cartItem->quantity,
                'size'        => $productItem->size,
                'price'       => ($cartItem->product->price - ($cartItem->product->price * ($cartItem->product->sale / 100))) * $cartItem->quantity,
            ]);
        }

        // 3. Clear the user's cart
        ShoppingCart::where('user_id', $userId)->delete();

        DB::commit(); // Commit transaction

        return [
            'success' => true,
            'message' => 'Order items added successfully.'
        ];

    } catch (\Exception $e) {
        DB::rollBack(); // Rollback on error

        return [
            'success' => false,
            'message' => 'Failed to add order items: ' . $e->getMessage()
        ];
    }
}


}

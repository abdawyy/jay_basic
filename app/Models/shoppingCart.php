<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Apptraits;

class shoppingCart extends Model
{
    use Apptraits;
    use HasFactory;
    protected $fillable = [
       'user_id',
       'products_id',
       'size_id',
       'quantity',




    ];
    protected $table = 'shopping_cart';
 // Define the relationship with the User model
 public function user()
 {
     return $this->belongsTo(user::class);
 }
 public function product()
 {
     return $this->belongsTo(products::class,'products_id');
 }
 public function productItems()
 {
     return $this->belongsTo(productItems::class,'size_id');
 }

  // Calculate the total price for a specific user
  public function totalPrice($userId , $cityPrice , $promoCode = 0)
  {
      // Retrieve all orders for the given user
      $orders = $this->where('user_id', $userId)->get();

      // Initialize total price
      $total = 0;

      // Loop through the orders and calculate the total
      foreach ($orders as $order) {
          $productPrice = $order->product->price; // Assuming price is in the Product model

          // Calculate the total for each item (product price + size price) * quantity
          $total += ( $order->product->price - ($order->product->price *$order->product->sale / 100) ) * $order->quantity;;
      }
      $totalWithoutDevFees= $total -($total *  $promoCode / 100);
      $totalPrice = $totalWithoutDevFees + $cityPrice;

      return $totalPrice;
  }
  public static function getCartItemsByUserId($userId)
  {
      try {
          // Retrieve all cart items for the given user ID
          $cartItems = self::where('user_id', $userId)->with('product')->get();

          return $cartItems;

      } catch (\Exception $e) {
          // Log the error for debugging

          // Return null or an empty collection in case of error
          return collect();
      }
  }


}

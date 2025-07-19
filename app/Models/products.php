<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Apptraits;

class products extends Model
{
    use Apptraits;
    use HasFactory;
    protected $fillable = [
       'name',
       'description',
       'price',
       'sale',
       'category_id',
       'color',
       'type_id',



    ];
    protected $table = 'products';
 // Define the relationship with the User model
 public function category()
 {
     return $this->belongsTo(Category::class);
 }
 public function type()
 {
     return $this->belongsTo(Type::class);
 }
 public function orderItems(){
    return $this->hasMany(orderItems::class , 'products_id');

}
public function shoppingCart()
{
    return $this->hasMany(shoppingCart::class);
}
public function productItems()
{
    return $this->hasMany(productItems::class);
}
public function productImages(){
    return $this->hasMany(productImages::class);
}
}

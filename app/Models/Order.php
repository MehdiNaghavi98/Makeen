<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = ['buyer_id' , 'status' , 'cart_number' , 'total_price' , 'code'];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('quantity', 'color', 'size')
            ->withTimestamps();
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}

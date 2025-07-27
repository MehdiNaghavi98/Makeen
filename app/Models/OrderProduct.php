<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Exception\TimeSourceException;

class OrderProduct extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'size', 'color'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

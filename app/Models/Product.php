<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Product extends Model implements HasMedia
{
    use HasFactory,Notifiable,InteractsWithMedia;
    protected $fillable = ['name', 'price', 'description' , 'image' , 'status' ,  'category_id' , 'quantity' , 'seller_id' , 'gender' , 'brand'];


    public function user()
    {
        return $this->belongsTo(User::class , 'seller_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class ,  'property_product')->withPivot('content');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->withPivot('quantity', 'color', 'size')
            ->withTimestamps();
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

}

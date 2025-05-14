<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,Notifiable;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}

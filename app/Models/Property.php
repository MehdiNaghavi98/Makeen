<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Property extends Model
{
    use HasFactory,Notifiable;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finall extends Model
{
    use HasFactory;
    protected $table = 'finals';
    protected $fillable = ['user_id' , 'code' , 'total_price' , 'status'];


    public function finalproducts()
    {
        return $this->hasMany(FinalProduct::class, 'final_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

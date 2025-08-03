<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProduct extends Model
{
    use HasFactory;

    protected $fillable = ['final_id', 'product_id', 'quantity', 'size', 'color'];


    public function final()
    {
        return $this->belongsTo(Finall::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

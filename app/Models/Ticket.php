<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['title' ,'category' , 'description' , 'answer' , 'user_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

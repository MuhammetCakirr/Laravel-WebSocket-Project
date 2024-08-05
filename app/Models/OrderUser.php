<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;
    protected $table="order_user";
    protected $fillable=["order_id","name","email","phone"];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}

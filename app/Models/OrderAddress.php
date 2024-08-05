<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    protected $table="order_address";
    protected $fillable=["order_id","country","city","state","line_1","line_2"];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table="order_items";
    protected $fillable=["order_id","product_id","quantity","name","description","price","discount_price","is_discount"];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

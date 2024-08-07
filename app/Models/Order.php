<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table="orders";
    protected $fillable=["branch_id","status_id","customer_id","subtotal","tax","total_amount"];

    public function branch(){
        return $this->belongsTo(Branche::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function orderAddress(){
        return $this->hasOne(OrderAddress::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class);
    }

    public function orderUser(){
        return $this->hasOne(OrderUser::class);
    }
}

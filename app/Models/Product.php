<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $is_discount
 * @property float $price
 * @property float $discount_price
 * @property string $description
 * @property int $id
 * @property string $name
 * @property int $stock
 */
class Product extends Model
{
    use HasFactory;

    protected $table="products";
    protected $fillable=["name","description","price","discount_price","is_discount","stock"];
}

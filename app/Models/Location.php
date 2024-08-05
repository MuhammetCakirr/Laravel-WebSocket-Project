<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table="locations";

    protected $fillable=["country","city","state","line_1","line_2"];

    public function branch(){
        return $this->belongsTo(Branche::class);
    }
}

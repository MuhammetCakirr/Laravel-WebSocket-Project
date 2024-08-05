<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;
    protected $table="branches";

    protected $fillable=["name","location_id"];

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function orders()
    {
        return $this->hasMany(Location::class);
    }
}

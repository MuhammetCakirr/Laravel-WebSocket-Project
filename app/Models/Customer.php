<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 */
class Customer extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;

    protected $table="customers";

    protected $fillable=["name","phone","email","password"];
    protected $hidden=["password","created_at","updated_at","id"];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}

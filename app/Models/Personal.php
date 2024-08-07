<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**,
 * @property string $password
 */
class Personal extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="personals";
    protected $fillable=["name","email","password","branchId"];
    protected  $hidden=["password","created_at","updated_at","id"];

    public function branche(){
        return $this->belongsTo(Branche::class,'branchId');
    }
}

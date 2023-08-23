<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;
    public $table = "users_verify";
    protected $fillable = [
        'user_id',
        'token',
    ];
    
    public function user()
    {
        return $this->belongsTo(Webuser::class,'id','user_id');
    }
}

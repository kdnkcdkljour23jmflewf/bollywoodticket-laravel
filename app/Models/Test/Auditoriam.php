<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test\AuditoriamSeat;

class Auditoriam extends Model
{
    use HasFactory;
    protected $table = 'auditoriam';
    public function seatdetail() {
        return $this->hasMany(AuditoriamSeat::class,'auditoriam_id','id');

        // return $this->hasOne(Order::class)->ofMany('price', 'max');
        // return $this->hasOne(Order::class)->latestOfMany();
        // return $this->hasOne(Order::class)->oldestOfMany();

    }
}

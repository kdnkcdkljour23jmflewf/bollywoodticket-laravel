<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test\Auditoriam;

class AuditoriamSeat extends Model
{
    use HasFactory;
    protected $table = 'auditoriam_seat';
    
    public function audiname() {
        return $this->belongsTo(Auditoriam::class,'auditoriam_id','id');
        // return $this->belongsTo(Auditoriam::class,'id','auditoriam_id');
    }
}

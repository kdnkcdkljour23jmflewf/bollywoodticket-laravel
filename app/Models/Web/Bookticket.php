<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookticket extends Model
{
    use HasFactory;
    public $table = 'bookticket';
    protected $fillable = [
        'movieid',
        'seatbook',
        'status',
        'created_by'
    ];
}

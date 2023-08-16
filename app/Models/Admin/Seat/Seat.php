<?php

namespace App\Models\Admin\Seat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    protected $table = 'auditoriam_seat';
    use HasFactory,SoftDeletes;
}

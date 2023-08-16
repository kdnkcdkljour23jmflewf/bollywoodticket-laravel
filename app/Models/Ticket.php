<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Admin\Movie\Movie;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket_system';
    protected $fillable = [
        'price',
        'movie_id',
        'category_id',
        'auditoriam_id',
    ];

    public function movies()
    {
        return $this->hasOne(Movie::class,'id','movie_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}

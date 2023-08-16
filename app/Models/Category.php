<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Movie\Movie;
class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'category';
    public function movies()
    {
        return $this->belongsTo(Movie::class,'category_id','id');
    }
}

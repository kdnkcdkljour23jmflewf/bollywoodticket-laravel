<?php

namespace App\Models\Admin\Movie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'movie';
    protected $fillable = [
        'name',
        'image',
        'category_id',
    ];
    public function name():Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }
    public function category_data():HasOne
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}

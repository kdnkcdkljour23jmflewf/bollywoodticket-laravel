<?php

namespace App\Http\Controllers\API\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Category as Categories;

class CategoryController extends Controller
{
    public function category_list()
    {
        return $category_data = Categories::collection(Category::whereNull('deleted_at')->where(['status'=>1])->get());
        // return response()->json($category_data,200);
    }
}

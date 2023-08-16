<?php

namespace App\Http\Controllers\API\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Movie\Movie;
use App\Http\Resources\Product;

class ProductController extends Controller
{
    public function product_list()
    {
        return $category_data = Product::collection(Movie::whereNull('deleted_at')->where(['status'=>1])->get());
        // return response()->json($category_data,200);
    }
}

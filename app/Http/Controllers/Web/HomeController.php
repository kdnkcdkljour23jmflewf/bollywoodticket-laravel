<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Movie\Movie;

class HomeController extends Controller
{
    public function home()
    {
        $data['movie'] = Movie::with('category_data')->whereNull('deleted_at')->take(5)->orderBy('id','DESC')->get();
        // dd($data);
        return view('web.home.home',$data);
    }
}

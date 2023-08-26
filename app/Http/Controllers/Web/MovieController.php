<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function book_ticket($id=null)  {
        $id = explode('=',$id)[1]??'';
        $id = decrypt($id);
        dd($id);
        return view('web.movie.book');
    }
}

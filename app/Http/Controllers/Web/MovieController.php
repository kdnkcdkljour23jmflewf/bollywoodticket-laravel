<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function book_ticket()  {
        return view('web.movie.book');
    }
}

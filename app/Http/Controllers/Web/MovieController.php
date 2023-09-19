<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\Bookticket;

class MovieController extends Controller
{
    public function book_ticket($id=null,Request $r)  {

        $id = explode('=',$id)[1]??'';
        $id = decrypt($id);
        if($r->isMethod('post')){
            // $r->seatselect
            // dd($r->all());
            // Bookticket::insert();
        }
        // dd($id);
        return view('web.movie.book');
    }
}

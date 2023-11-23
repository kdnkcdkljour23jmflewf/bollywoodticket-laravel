<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\Bookticket;
use App\Models\Admin\Movie\Movie;

class MovieController extends Controller
{
    public function book_ticket($id=null,Request $r)  {

        $id = explode('=',$id)[1]??'';
        $id = decrypt($id);
        if($r->isMethod('post')){
            // $r->seatselect
            // dd($r->all());
            Bookticket::insert();
        }
        // dd($id);
        $data['movie_data'] = Movie::find($id)->name;
        // dd($data);
        return view('web.movie.book',$data);
    }
}

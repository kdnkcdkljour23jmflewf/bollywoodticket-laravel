<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web\Bookticket;
use App\Models\Admin\Movie\Movie;
use Auth;
use App\Jobs\MyQueueJob;
class MovieController extends Controller
{
    public function book_ticket($id=null,Request $r)  {
        $id = explode('=',$id)[1]??'';
        $id = decrypt($id);
        if($r->isMethod('post')){
            MyQueueJob::dispatch($r->all(),$id);
        }
        // dd($id);
        $data['movie_data'] = Movie::find($id)->name;
        $data['movie_id'] = $id;
        // dd($data);
        return view('web.movie.book',$data);
    }
}

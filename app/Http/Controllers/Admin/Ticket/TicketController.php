<?php

namespace App\Http\Controllers\Admin\Ticket;
use App\Http\Controllers\Admin\CustomController;
use App\Models\Ticket;
use DB;
use App\Models\Admin\Movie\Movie;
class TicketController extends CustomController
{
    public function ticket_add($id = null){
        $data['edit_data'] = [];
        if($this->r->isMethod('post')){
            if(!empty($id)){

                $this->r->validate([
                    'category'=>'required',
                    'movie'=>'required',
                    'audtoriam'=>'required',
                    'movie_price'=>'required|numeric|min:1|max:1000',
                ]);   
                
                $id = decrypt($id);
                $update_array = [
                    'price' => $this->r->movie_price,
                    'movie_id' => $this->r->movie,
                    'category_id' => $this->r->category,
                    'auditoriam_id' => implode(',',$this->r->audtoriam),
                ];
                Ticket::where(['id'=>$id])->update($update_array);
                
            }else{
                
                $this->r->validate([
                    'category'=>'required',
                    'movie'=>'required',
                    'audtoriam'=>'required',
                    'movie_price'=>'required|numeric|min:1|max:1000',
                ]);                

                Ticket::insert([
                    'price' => $this->r->movie_price,
                    'movie_id' => $this->r->movie,
                    'category_id' => $this->r->category,
                    'auditoriam_id' => implode(',',$this->r->audtoriam),
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
                
            }
            return redirect('admin/ticketprice-list');
        }
        if(!empty($id)){
            $id = decrypt($id);
            $ticket_data = Ticket::find($id);
            $data['edit_data'] = $ticket_data;
        }
        $data['category'] = $this->category::where(['deleted_at'=>NULL,'status'=>1])->get();
        $data['audtoriam'] = DB::table('auditoriam')->select('*')->where(['status'=>1,'deleted_at'=>NULL])->get();
        // dd($data['audtoriam']);
        return view('admin.ticketsystem.add',$data);
    }

    public function ticket_list()
    {
        $data['ticket_list'] = Ticket::with('movies','category')->paginate(5);
        // dd($data['ticket_list']);
        return view('admin.ticketsystem.list',$data);
    }
    public function ticket_delete()
    {
        $id = $this->r->data_id;
        Ticket::where(['id'=>$id])->delete();
        $data['msg'] = 1;
        echo json_encode($data,true);
        // return json_encode($data);
    }

    //function to get the movie detials on the basis of category id
    public function get_movie()
    {
        // dd($this->r->all());
        $category_id = $this->r->category_id;
        $data['movie_data'] = Movie::where(['category_id'=>$category_id])->select('id','name')->get();
        return json_encode($data,true);
    }
}

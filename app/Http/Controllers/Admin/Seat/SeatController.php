<?php

namespace App\Http\Controllers\Admin\Seat;

use App\Models\Admin\Seat\Seat;
use App\Http\Controllers\Admin\CustomController;
use DB;
use Illuminate\Support\Facades\App;
class SeatController extends CustomController
{
    public function seat_add($id = null){
        $data['edit_data'] = [];
        if($this->r->isMethod('post')){
            if(!empty($id)){

                $this->r->validate([
                    'seat_quantity'=>'required|numeric|min:1|max:250',
                ]);
                
                $id = decrypt($id);
                $update_array = [
                    'quantity' => $this->r->seat_quantity
                ];
                Seat::where(['id'=>$id])->update($update_array);
                
            }else{
                App::setLocale('en');

                $this->r->validate([
                    'category'=>'required',
                    'seat_quantity'=>'required|numeric|min:1|max:250',
                ]);                

                $seat = new Seat;
                $seat->quantity = $this->r->seat_quantity;
                $seat->status = 1;
                $seat->auditoriam_id = $this->r->category;
                $seat->created_at = date('Y-m-d h:i:s');
                $seat->save();
            }
            return redirect('admin/seat-list');
        }
        if(!empty($id)){
            $id = decrypt($id);
            $seat_data = Seat::find($id);
            $data['edit_data'] = $seat_data;
        }
        $data['audtoriam'] = DB::table('auditoriam')->select('*')->where(['status'=>1,'deleted_at'=>NULL])->get();
        return view('admin.seat.add',$data);
    }

    public function seat_list()
    {
        $data['seat_list'] = DB::table('auditoriam_seat')
                                ->join('auditoriam','auditoriam_seat.auditoriam_id','=','auditoriam.id')
                                ->select('auditoriam.name','auditoriam_seat.quantity','auditoriam_seat.id')
                                ->paginate(5);
        // dd($data['seat_list']);
        return view('admin.seat.list',$data);
    }
    public function seat_delete()
    {
        $id = $this->r->data_id;
        Seat::where(['id'=>$id])->delete();
        $data['msg'] = 1;
        echo json_encode($data,true);
        // return json_encode($data);
    }
}

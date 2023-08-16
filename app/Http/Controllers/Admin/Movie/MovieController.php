<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Admin\CustomController;
use App\Models\Admin\Movie\Movie;
class MovieController extends CustomController
{
    
    public function movie_add($id = null){
        $data['edit_data'] = [];
        if($this->r->isMethod('post')){
            if(!empty($id)){

                // dd($this->r->all());

                // $this->r->validate([
                //     'name'=>'required|max:255'.'|unique:category,name,'.$id,
                //     'status'=>'required',
                // ]);
                
                $id = decrypt($id);
                $image_name = [];
                if($this->r->image){
                    $image_name = $this->myService->muliple_image_upload('movie',$this->r);
                }
                $image_data = array_filter(explode(',',$this->r->image_data));
                $image_data = implode(',',array_merge($image_data,$image_name));
                $update_array = [
                    'name' => $this->r->name,
                    'status' => $this->r->status,
                    'image' => $image_data,
                    'category_id' => $this->r->category,
                ];
                Movie::where(['id'=>$id])->update($update_array);
                
            }else{
                // $this->r->validate([
                //     'name'=>'required|unique:movie|max:255',
                //     'image'=>'required|mimes:jpg,bmp,png',
                //     'status'=>'required',
                // ]);                

                $image_name = '';
                if($this->r->image){
                    $image_name = $this->myService->muliple_image_upload('movie',$this->r);
                }

                $movie = new Movie;
                $movie->name = $this->r->name;
                $movie->image = implode(',',$image_name);
                $movie->status = $this->r->status;
                $movie->category_id = $this->r->category;
                $movie->created_at = date('Y-m-d h:i:s');
                $movie->save();
            }
            return redirect('admin/movie-list');
        }
        if(!empty($id)){
            $id = decrypt($id);
            $movie_data = Movie::find($id);
            $data['edit_data'] = $movie_data;
        }
        $data['category'] = $this->category::whereNull('deleted_at')->get();
        return view('admin.movie.add',$data);
    }

    public function movie_list()
    {
        $data['movie_list'] = Movie::with('category_data')->whereNull('deleted_at')->paginate(5);
        // dd($data['movie_list']);
        return view('admin.movie.list',$data);
    }
    public function movie_delete()
    {
        $id = $this->r->data_id;
        Movie::where(['id'=>$id])->delete();
        $data['msg'] = 1;
        echo json_encode($data,true);
        // return json_encode($data);
    }
}

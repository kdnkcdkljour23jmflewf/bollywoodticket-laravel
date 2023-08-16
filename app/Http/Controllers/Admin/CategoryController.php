<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CustomController;

class CategoryController extends CustomController
{
    public function category_add($id = null){
        
        $data['edit_data'] = [];
        if($this->r->isMethod('post')){
            if(!empty($id)){
                // dd($id);
                $this->r->validate([
                    'name'=>'required|max:255'.'|unique:category,name,'.$id,
                    'status'=>'required',
                ]);
                $update_array = [
                    'name' => $this->r->name,
                    'status' => $this->r->status,
                ];
                $this->category->where(['id'=>$id])->update($update_array);
                
            }else{
                $this->r->validate([
                    'name'=>'required|unique:category|max:255',
                    'image'=>'required|mimes:jpg,bmp,png',
                    'status'=>'required',
                ]);
                $insert_array = [
                    'name' => $this->r->name,
                    'status' => $this->r->status,
                    'parent_id' => $this->r->status,
                    'created_by' => $this->r->status,
                ];
                if($this->r->image){
                    $image_anme = $this->myService->image_upload('category',$this->r);
                    $insert_array['image'] = $image_anme;
                }
                
                $this->category->insert($insert_array);
            }
            return redirect('admin/category-list');
        }
        if(!empty($id)){
            $category_data = $this->category::find($id);
            $data['edit_data'] = $category_data;
        }
        return view('admin.category.add',$data);
    }

    public function category_list()
    {
        $data['category_list'] = $this->category::whereNull('deleted_at')->get();
        return view('admin.category.list',$data);
    }
    public function category_delete()
    {
        // $id = $this->r->data_id;
        // $this->category::where(['id'=>$id])->delete();
        $data['msg'] = 1;
        echo json_encode($data,true);
        // return json_encode($data);
    }
}

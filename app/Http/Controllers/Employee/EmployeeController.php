<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employeeresume;

class EmployeeController extends Controller
{
    public function emp_list(Request $request)
    {
        return view('employee.list');
    }
    public function emp_form(Request $request)
    {
        if($request->isMethod('post')){
            $resume = time().'.'.$request->resume->extension();
            $request->resume->move(public_path('resume'), $resume);
            $insert_array = 
            [
                'company' => $request->company,
                'name' => $request->name,
                'address' => $request->address,
                'position' => $request->position,
                'hr_status' => 0,
                'resume' => $resume
            ];
            Employeeresume::insert($insert_array);
            return redirect('emp_resume_list');
        }
        return view('employee.resume');
    }
    public function emp_form_edit(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $resume = time().'.'.$request->resume->extension();
            $request->resume->move(public_path('resume'), $resume);
            $update_array = 
            [
                'name' => $request->name,
                'address' => $request->address,
                'position' => $request->position,
                'resume' => $resume
            ];
            Employeeresume::where(['id'=>$id])->update($update_array);
            return redirect('emp_resume_list');
        }
        $data['emp_data'] = [];
        if(!empty($id)){
            $resume_data = Employeeresume::where(['id'=>$id])->first();
            $data['emp_data'] = $resume_data;
        }
        return view('employee.resume_edit',$data);
    }
    public function emp_resume_list()
    {
        $employe_resume_list = Employeeresume::get();
        $data['employe_resume_list'] = $employe_resume_list;
        return view('employee.resume_list',$data);
    }
    public function emp_resume_delete(Request $request)
    {
        if(!empty($request->id)){
            $id = $request->id;
            Employeeresume::where(['id'=>$id])->delete();
        }
        $data['msg'] = 1;
        echo json_encode($data,true);
    }
}

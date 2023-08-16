<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employeeresume;


class HrController extends Controller
{
    public function emp_resume_list(Request $r)
    {
        if($r->isMethod('post')){
            Employeeresume::where(['id'=>$r->id])->update(['hr_status'=>$r->status]);
            $data['msg'] = 1;
            return json_encode($data,true);
        }
        $employe_resume_list = Employeeresume::get();
        $data['employe_resume_list'] = $employe_resume_list;
        return view('hr.resume_list',$data);
    }
}

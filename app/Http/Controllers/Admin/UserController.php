<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CustomController;

class UserController extends CustomController
{
    public function user_login()
    {
        // dd($this->r->all());
        if($this->r->isMethod('post')){
            if(CustomController::userlogin($this->r)){
                return redirect('admin/dashboard');
            }
        }
        return view('admin.user.login');
    }
    public function user_logout()
    {
        if(CustomController::userlogout()){
            // die;
            return redirect('admin/dashboard');   
        }
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class UserController extends Controller
{
    public function __construct(){
        App::setLocale(env('language','en'));
    }

    function user_login(Request $r) {
        if($r->isMethod('post')){
            $email = $r->email;
            $password = $r->password;
            if(user_login($email,$password)){
                $r->session()->flash('success', 'Login successful!');
                return redirect('user-dashboard');
            }else{
                $r->session()->flash('error', 'Register unsuccessful user exist');
            }
        }
        return view('web.user.login');
    }

    function user_register(Request $r) {
        $data['msg'] = '';
        if($r->isMethod('post')){
            
            $r->validate([
                'email' => 'required|unique:webusers',
                'name' => 'required',
                'password' => 'required',
            ]);

            $user['email'] = $r->email;
            $user['password'] = $r->password;
            $user['name'] = $r->name;
            $result = user_register($user);
            if($result){
                $r->session()->flash('success', 'Register successful!');
                return redirect('user-login');
            }else{
                $r->session()->flash('error', 'Register unsuccessful user exist');
            }

        }
        return view('web.user.register');
    }
    function user_dashboard() {
        return view('web.user.dashboard');
    }
}
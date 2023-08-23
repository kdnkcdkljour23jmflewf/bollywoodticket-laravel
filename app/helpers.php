<?php
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Web\Webuser;
if(!function_exists('user_login')){
    function user_login($username,$password){
        if(Auth::guard('web')->attempt(['email'=>$username,'password'=>$password])){
            return true;
        }else{
            return false;
        }
    }
}
if(!function_exists('user_register')){
    function user_register($user_data){
        $count = Webuser::where(['email'=>$user_data['email']])->count();
        if($count > 0){
            return false;
        }else{
            $id  = Webuser::insertGetId([
                'email' => $user_data['email'],
                'name' => $user_data['name'],
                'password' => Hash::make($user_data['password']),
            ]);
            return $id;
        }
    }
}
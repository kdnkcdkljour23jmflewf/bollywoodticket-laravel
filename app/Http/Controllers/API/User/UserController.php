<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash,Auth;
class UserController extends Controller
{
    public function user_register(Request $r)
    {
        $email = $r->email;
        $password = $r->password;
        $name = $r->name;
        $user = User::create(['name'=>$name,'email'=>$email,'password'=>Hash::make($password)]);
        $data['token'] = $user->createToken('MyApp')->plainTextToken;
        $data['email'] = $user->email;
        return response()->json($data,200);
    }
    public function user_login(Request $r)
    {
        $email = $r->email;
        $password = $r->password;
        if(Auth::guard('web')->attempt(['email'=>$email,'password'=>$password])){
            $data['token'] = auth()->user()->createToken('API Token')->plainTextToken;
            $data['email'] = $email;
        }else{
            $data['error'] = 'Wrong Email or Password';
        }
        return response()->json($data,200);   
    }
}

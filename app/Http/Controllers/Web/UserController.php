<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mail; 
use Str;
use App\Models\Web\UserVerify;
class UserController extends Controller
{
    public function __construct(){
        App::setLocale(env('language','en'));
    }

    function user_login(Request $r) {
        if($r->isMethod('post')){
            $r->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $email = $r->email;
            $password = $r->password;
            if(user_login($email,$password)){
                // dd(5555);
                $r->session()->flash('success', 'Login successful!');
                return redirect('user-dashboard');
            }else{
                // dd(4444);
                $r->session()->flash('error', 'Register unsuccessful user exist');
            }
        }
        return view('web.user.login');
    }

    function user_register(Request $r) {
        $data['msg'] = '';
        if($r->isMethod('post')){       


            // dd(222);
           /*  $r->validate([
                'email' => 'required|unique:webusers',
                'name' => 'required',
                'password' => 'required',
            ]);
 */
            $user['email'] = $r->email;
            $user['password'] = $r->password;
            $user['name'] = $r->name;
            $id = user_register($user);

            $token = Str::random(64);

            
            UserVerify::create([
                'user_id' => $id, 
                'token' => $token
            ]);

            // guptadharmanshu@gmail.com

            Mail::send('web.emails.VerificationEmail', ['token' => $token], function($message) use($r){
               
                $message->from($r->email);
                $message->sender($r->email);
                $message->to($r->email);
                $message->subject('Email Verification Mail');
            });
            dd(222);

            if($id){
                // dd(444);
                $r->session()->flash('success', 'Register successful!');
                return redirect('user-login');
            }else{
                // dd(333);
                $r->session()->flash('error', 'Register unsuccessful user exist');
            }

        }
        return view('web.user.register');
    }
    function user_dashboard() {
        return view('web.user.dashboard');
    }
    public function verifyAccount($token,Request $r)
    {
        $verifyUser = UserVerify::where('token', $token)->first();        
        $message = 'Sorry your email cannot be identified.';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!empty($user) && !$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = 'Your e-mail is verified. You can now login.';
                $r->session()->flash('success', 'Your e-mail is verified. You can now login.');
            } else {
                $message = 'Your e-mail is already verified. You can now login';
                $r->session()->flash('error', 'Your e-mail is already verified. You can now login');
            }
        }
        $url = URL::to('user-login');
        dd($url);
        echo '<script>
            alert("'.$message.'")
            window.location.href = "'.$url.'"
        </script>';
    //   return redirect()->route('user-login');
    }
}

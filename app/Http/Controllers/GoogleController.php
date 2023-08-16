<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login()
    {
        return view('web.user');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
            dd($user);
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            }else{
                // dd($user->id);
                $user_array = [
                                'name' => $user->name,
                                'email' => $user->email,
                                'google_id'=> $user->id,
                                'password' => Hash::make(123456)
                            ];

                User::insert($user_array);
                die;
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function dashboard(Request $request)
    {
        dd($request->session()->all());
    }
}
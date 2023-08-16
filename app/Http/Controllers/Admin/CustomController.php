<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Custom\Image;
use App\Contracts\MyServiceInterface;
use App\Models\Category;
use Illuminate\Support\Facades\App;
class CustomController extends Controller
{
    public $myService;
    public function __construct(Request $r,Image $image,MyServiceInterface $myService,Category $category){
        $this->r = $r;
        $this->image = $image;
        $this->myService = $myService;
        $this->category = $category;
        App::setLocale(env('language','en'));
    }

    public static function userlogin(Request $r)
    {
        if(Auth::guard('admin')->attempt(['email'=>$r->email,'password'=>$r->password])){
            return true;
        }
        return false;
    }

    public static function userlogout()
    {
        Auth::guard('admin')->logout();
        return true;
    }
    public static function file_upload($request,$input_name,$path)
    {
        $file = $request->file($input_name);
        $file->move($path,$file->getClientOriginalName());
        return true;
    }
}

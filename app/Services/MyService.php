<?php
namespace App\Services;

use App\Contracts\MyServiceInterface;

class MyService implements MyServiceInterface
{
    public function image_upload($path,$request_data):string
    {
        $imagename = time().'.'.$request_data->image->extension();
        $request_data->image->move(public_path($path),$imagename);
        return $imagename;
    }
    public function muliple_image_upload($path,$request_data):array
    {
        $upload_image = [];
        foreach ($request_data->image as $key => $value) {
            $imagename = rand(10,1000).time().'.'.$value->extension();
            $value->move(public_path($path),$imagename);
            $upload_image[] = $imagename;
        }
        return $upload_image;
    }
}
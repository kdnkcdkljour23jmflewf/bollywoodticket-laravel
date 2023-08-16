<?php
namespace App\Contracts;

interface MyServiceInterface
{
    public function image_upload($path,$request_data);
    public function muliple_image_upload($path,$request_data);
}
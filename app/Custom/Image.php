<?php
namespace App\Custom;
use App\Custom\Imagedata;
class Image implements Imagedata {
    public function __construct()
    {
        // die;
    }
    public function storeimage()
    {
        echo 'Image data is processiong';
    }
}
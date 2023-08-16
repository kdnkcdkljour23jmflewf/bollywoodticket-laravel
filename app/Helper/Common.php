<?php
if(!function_exists('file_upload')){
    function file_upload($request,$input_name,$path)
    {
        $file = $request->file($input_name);
        $file->move($path,$file->getClientOriginalName());
        return true;
    }
}
?>
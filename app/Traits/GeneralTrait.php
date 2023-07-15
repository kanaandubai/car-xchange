<?php

namespace App\Traits;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnErrorWithData($key, $value,$errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg,
            $key => $value

        ]);
    }
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg


        ]);
    }


    public function returnSuccessMessage($msg = "", $errNum = "200")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "",$statusNumber)
    {
        return response()->json([
            'status' => $statusNumber,
            'msg' => $msg,
            $key => $value
        ]);
    }
    public function returnDataWithCount($key, $value,$key1, $value1, $msg = "",$statusNumber)
    {
        return response()->json([
            'status' => $statusNumber,
            'msg' => $msg,
            $key => $value,
            $key1 => $value1
        ]);
    }


    function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }

//    function cloudinaryUplode($photo,$folder){
//        //save photo in folder
//        $file_extension = $photo -> getClientOriginalExtension();
//        $file_name = time().'.'.$file_extension;
//        $path = $folder;
//        $photo -> move($path,$file_name);
//
//        return $file_name;
//    }








}

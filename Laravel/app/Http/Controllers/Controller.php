<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //七牛上传
    public function upload($filePath,$fileName,$part = ''){
//        require_once '';
        $accessKey = 'Wt0gW4tXV6YzNEvSVF7gH4pkKK4VS2clrr1zzsZq';
        $secretKey = 'J80IASO_VCA3CrTVL7434PPHeqo8gMFtGuSh39zg';
        // 初始化签权对象。
        $auth = new Auth($accessKey, $secretKey);
        $bucket = "opskzr9p0.bkt.clouddn.com";
        $upToken = $auth->uploadToken($bucket);
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        $key = 'http://opgmvuzyu.bkt.clouddn.com/'.$part.$fileName;
        list($ret, $err) = $uploadMgr->putFile($upToken, $key, $filePath);
        if ($err !== null) {
            echo json_encode($err);
        } else {
            echo json_encode($ret);
        }
    }
}

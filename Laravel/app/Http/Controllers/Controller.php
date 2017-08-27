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
        require_once app_path('Tools/Qiniu/autoload.php');
        $accessKey = config('qiniu.AccessKey');
        $secretKey = config('qiniu.SecretKey');
        $auth = new Auth($accessKey, $secretKey);
        $bucket = config('qiniu.bucket');
        $upToken = $auth->uploadToken($bucket);
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        $key = $part.$fileName;
        list($ret, $err) = $uploadMgr->putFile($upToken,$key,$filePath);
        if ($err !== null) {
            return false;
        } else {
            return $ret;
        }
    }

    public function base64url_encode($data){
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

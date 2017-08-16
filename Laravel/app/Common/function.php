<?php
/**
 * Created by dollar
 * User: Administrator
 * Date: 2017/03/15
 * Time: 15:28
 * copyright zxdkg
 */


/*
 * 
 * @todo 获取设备系统类型
 * 
 */
if(!function_exists('_isIOS')){
    function _isIOS() {
        $ios = false;
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iOS')){
            $ios = true;
        }
        return $ios;
    }
}
/*
 * 
 * @todo 获取设备系统类型
 * 
 */
if(!function_exists('_isAndroid')){
    function _isAndroid() {
        $android = false;
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
            $android = true;
        }
        return $android;
    }
}
/*
 * 
 * @todo 获取当前时间（毫秒）
 * 
 */
if(!function_exists('_getMillisecond')){
    function _getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }
}
/*
 * 
 * @todo rsa 签名
 * 
 */
if(!function_exists('_sign')){
    function _sign($data){
        $private_content=file_get_contents(__DIR__.'/../../config/key/cn_private.key');
        $private_key=openssl_get_privatekey($private_content);
        openssl_sign($data,$sign,$private_key);
        openssl_free_key($private_key);
        $sign=base64_encode($sign);//最终的签名　
        return $sign;
    }
}
/*
 * 
 * @todo rsa 验签
 * 
 */
if(!function_exists('_verify')){
    function _verify($data,$sign){echo $data."</br>";
        $public_content=file_get_contents(__DIR__.'/../../config/key/public.key');
        $public_key=openssl_get_publickey($public_content);
        $sign=base64_decode($sign);//得到的签名
        echo $sign."</br>";;
        $result=openssl_verify($data,$sign,$public_key); print_r($result);exit;
        openssl_free_key($public_key);
        return $result;
    }
}
/*
 * 
 * @todo rsa 公钥加密
 * 
 */
if(!function_exists('_encrypt')){
    function _encrypt($data){
        $public_content = file_get_contents(__DIR__.'/../../config/key/public.key');
        $pubkey = openssl_get_publickey($public_content);
        if (openssl_public_encrypt($data, $encrypted, $pubkey)){  
            $data = $encrypted;  
        }else{  
            $data = '';  
        }
        openssl_free_key($pubkey);
        return $data;  
    }
}
/*
 * 
 * @todo rsa 私钥解密
 * 
 */
if(!function_exists('_decrypt')){
    function _decrypt($data){
        $private_content = file_get_contents(__DIR__.'/../../config/key/cn_private.key');
        $privkey = openssl_get_publickey($private_content);
        if (openssl_private_decrypt($data, $decrypted, $privkey)){  
            $data = $decrypted;  
        }else{  
            $data = '';  
        }
        openssl_free_key($privkey);
        return $data;  
    }
}
/*
 * 
 * @todo 手机号验证
 * 
 */
if(!function_exists('_checkPhone')){
    function _checkPhone($phone){
        $res = false;
        if(preg_match("/^1[34578][0-9]\d{8}$/",$phone)){//  /^1\d{10}$/
            $res = true;
        }
        return $res;
    }
}
/*
 * 
 * @todo 身份证号验证
 * 
 */
if(!function_exists('_checkID')){
    function _checkID($ID){
        $res = false;
        if(preg_match("/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/",$ID)){//  1代2代
            $res = true;
        }
        return $res;
    }
}
/*
 * 
 * @todo 参数过滤
 * 
 */
if(!function_exists('_format')){
    function _format($filed){
        $val = isset($_GET[$filed])?$_GET[$filed]:(isset($_POST[$filed])?$_POST[$filed]:null);
        if($val == '' || empty($val) || $val == null){
            return false;
        }else{
            $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

            $search = 'abcdefghijklmnopqrstuvwxyz';
            $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $search .= '1234567890!@#$%^&*()';
            $search .= '~`";:?+/={}[]-_|\'\\';
            for ($i = 0; $i < strlen($search); $i++) {
                $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
                $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
            }

            $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
            $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
            $ra = array_merge($ra1, $ra2);

            $found = true; 
            while ($found == true) {
                $val_before = $val;
                for ($i = 0; $i < sizeof($ra); $i++) {
                    $pattern = '/';
                    for ($j = 0; $j < strlen($ra[$i]); $j++) {
                        if ($j > 0) {
                            $pattern .= '(';
                            $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                            $pattern .= '|';
                            $pattern .= '|(&#0{0,8}([9|10|13]);)';
                            $pattern .= ')*';
                        }
                        $pattern .= $ra[$i][$j];
                    }
                    $pattern .= '/i';
                    $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
                    $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                    if ($val_before == $val) {
                        $found = false;
                    }
                }
            }
            return $val; 
        }
    }
}
/*
 * 
 * @todo 发送httpPost请求
 * 
 */
if(!function_exists('_httpPost')){
    function _httpPost($url,$param){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_string($param)) {
                $strPOST = $param;
        } else {
                $aPOST = array();
                foreach($param as $key=>$val){
                        $aPOST[] = $key."=".urlencode($val);
                }
                $strPOST =  join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($oCurl, CURLOPT_POST,true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);       
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
                return $sContent;
        }else{
                return false;
        }
    }
}
/*
 * 
 * @todo 发送httpGet请求
 * 
 */
if(!function_exists('_httpGet')){
    function _httpGet($url){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
                return $sContent;
        }else{
                return false;
        }
    }
}
/**
 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
 * @return string
 */
if(!function_exists('_randString')){
    function _randString($len=6,$type='',$addChars='') {
        $str ='';
        switch($type) {
            case 0:
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
                break;
            case 1:
                $chars= str_repeat('0123456789',3);
                break;
            case 2:
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
                break;
            case 3:
                $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
                break;
            default :
                // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
                $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
                break;
        }
        if($len>10 ) {//位数过长重复字符串一定次数
            $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
        }

        $chars   =   str_shuffle($chars);
        $str     =   substr($chars,0,$len);

        return $str;
    }
}
/*
 * 
 * @todo 定义错误返回
 * 
 */
if(!function_exists('_errorFormat')){
    function _errorFormat($code){
        header('Content-Type:application/json;charset=utf-8');
        $arr = array(
            "success"=>false,
            "errorCode"=>$code,
            "errorMsg"=>errorMsg($code)
        );
        echo json_encode($arr);
        exit;
    }
}
/*
 * 
 * @todo 定义成功返回
 * 
 */
if(!function_exists('_successFormat')){
    function _successFormat($data=array()){
        header('Content-Type:application/json;charset=utf-8');
        $arr = array(
            "success"=>true,
            "errorCode"=>0,
            "data"=>(object)$data,
        );
        echo json_encode($arr);
        exit;
    }
}
/*
 * 
 * @todo 定义错误码
 * 
 */
if(!function_exists('errorMsg')){
    function errorMsg($code){
        $arr = array(
            //服务器级别
            '1001'=>'服务器正忙，请稍后再试',
            '1002'=>'请求非法',
            //客户端级别
            '2001'=>'请输入完整的信息',
            '2002'=>'该手机号已被注册',
            '2003'=>'验证码错误',
            '2004'=>'账号/密码错误',
            //用户级别
            '3001'=>'你的账号在其他设备登录请重新登录',
        );
        return $arr[$code];
    }
}
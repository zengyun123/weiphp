<?php

$appid = "wxf645e5f39d850ad8";
$secret = "0fce4b092074c0e1b377413018fc3c80";
$code = $_GET["code"];
$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';

$oCurl = curl_init();
    if(stripos($get_token_url,"https://")!==FALSE){
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
    }
    curl_setopt($oCurl, CURLOPT_URL, $get_token_url);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    $sContent = curl_exec($oCurl);

    curl_close($oCurl);
    $json_obj=json_decode($sContent,true);

//根据openid和access_token查询用户信息
$access_token = $json_obj['access_token'];
$openid = $json_obj['openid'];
$get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';

$oCurl2 = curl_init();
    if(stripos($get_user_info_url,"https://")!==FALSE){
    curl_setopt($oCurl2, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($oCurl2, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($oCurl2, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
    }
    curl_setopt($oCurl2, CURLOPT_URL, $get_token_url);
    curl_setopt($oCurl2, CURLOPT_RETURNTRANSFER, 1 );
    $res = curl_exec($oCurl2);

    curl_close($oCurl2);

//解析json
$user_obj = json_decode($res,true);
var_dump($user_obj);
exit();
$_SESSION['user'] = $user_obj;
$_SESSION['login'] = true;
//print_r($user_obj);
//var_dump($user_obj)
$url = '你要跳转的页面';
Header("Location: $url"); 

?>
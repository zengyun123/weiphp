<?php
	$code=$_GET['code'];	
	define('APPID','wxf645e5f39d850ad8');
	define('SECRET','0fce4b092074c0e1b377413018fc3c80');
	define('CODE',$code);
	$token_url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APPID.'&secret='.SECRET.'&code='.CODE.'&grant_type=authorization_code';
	$content=file_get_contents($token_url);
	$access_info=json_decode($content,true);
	if(!empty($access_info['errcode'])){
		header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf645e5f39d850ad8&redirect_uri=http%3A%2F%2Fekeylee.com%2Fwechat_info.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect");
		exit;
		}
	define('REFRESH_TOKEN',$access_info['refresh_token']);
	$refresh_url='https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.APPID.'&grant_type=refresh_token&refresh_token='.REFRESH_TOKEN.' ';
	$refresh=file_get_contents($refresh_url);
	$refresh=json_decode($refresh,true);
	define('ACCESS_TOKEN',$refresh['access_token']);
	define('OPENID',$refresh['openid']);
	$user_info_url='https://api.weixin.qq.com/sns/userinfo?access_token='.ACCESS_TOKEN.'&openid='.OPENID.'&lang=zh_CN ';
	$user_info=file_get_contents($user_info_url);
	$user_info=json_decode($user_info,true);
	if(!empty($user_info['errcode'])){
		header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf645e5f39d850ad8&redirect_uri=http%3A%2F%2Fekeylee.com%2Fwechat_info.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect");
		exit;
		}
	$unionid_url='https://api.weixin.qq.com/sns/userinfo?access_token='.ACCESS_TOKEN.'&openid='.OPENID.'&lang=zh_CN ';
	$json_unionid=file_get_contents($unionid_url);
	$json_unionid=json_decode($json_unionid,true);
	$unionid=$json_unionid['unionid'];
	
	?>
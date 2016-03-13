<?php
        	
namespace Addons\SignIn\Model;
use Home\Model\WeixinModel;
        	
/**
 * SignIn的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'SignIn' ); // 获取后台插件的配置参数	
		//dump($config);
	}
}
        	
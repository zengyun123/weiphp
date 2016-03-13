<?php
        	
namespace Addons\BugTest\Model;
use Home\Model\WeixinModel;
        	
/**
 * BugTest的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'BugTest' ); // 获取后台插件的配置参数	
		//dump($config);
                $this->replyText('BUrG11');
	}
}
        	
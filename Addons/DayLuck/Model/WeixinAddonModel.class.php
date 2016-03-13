<?php
        	
namespace Addons\DayLuck\Model;
use Home\Model\WeixinModel;
        	
/**
 * DayLuck的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'DayLuck' ); // 获取后台插件的配置参数	
		$this->replyText('每日抽奖5');
	}
}
        	
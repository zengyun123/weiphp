<?php
        	
namespace Addons\Bug\Model;
use Home\Model\WeixinModel;
        	
/**
 * Bug的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Bug' ); // 获取后台插件的配置参数	
		$param['openid']=get_openid();
		$param['token']=get_token();
		$userbyfollow=M('public_follow')->where($param)->find();
		$userinfo=get_userinfo($userbyfollow['uid']);
		$this->replyText($userinfo['nickname']);

	}
}
        	
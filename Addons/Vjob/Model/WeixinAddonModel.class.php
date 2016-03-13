<?php

namespace Addons\Vjob\Model;

use Home\Model\WeixinModel;

/**
 * Vjob的微信模型
 */
class WeixinAddonModel extends WeixinModel {
	function reply($dataArr, $keywordArr = array()) {
		$map ['token'] = get_token ();
		$keywordArr ['aim_id'] && $map ['id'] = $keywordArr ['aim_id'];
		$data = M ( 'vjob' )->where ( $map )->find ();
		
		// 其中token和openid这两个参数一定要传，否则程序不知道是哪个微信用户进入了系统
		$param ['token'] = get_token ();
		$param ['openid'] = get_openid ();
		$param ['id'] = $data ['id'];
		$url = addons_url ( 'Vjob://Vjob/show', $param );
		//组装图文回复的必须数组
		$info = M ( 'Vjob' )->where ( $map )->find ();
		$articles [0] = array (
				'Title' => $data ['title'],
				'Description' => $info ['intro'],
				'PicUrl' => get_cover_url ( $info ['cover'] ),
				'Url' => $url 
		);
		
		
		
		$this->replyNews ( $articles );
	}
	
	
	
	// 关注公众号事件
	public function subscribe() {
		return true;
	}
	
	// 取消关注公众号事件
	public function unsubscribe() {
		return true;
	}
	
	// 扫描带参数二维码事件
	public function scan() {
		return true;
	}
	
	// 上报地理位置事件
	public function location() {
		return true;
	}
	
	// 自定义菜单事件
	public function click() {
		return true;
	}
}
        	
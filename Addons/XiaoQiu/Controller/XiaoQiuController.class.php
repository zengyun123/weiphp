<?php

namespace Addons\XiaoQiu\Controller;
use Home\Controller\AddonsController;

class XiaoQiuController extends AddonsController{
	public function index(){
		echo getWechatApiObj();
		echo '<meta charset="utf-8">';
		print_r( get_token_appinfo());
		echo getRevVoice();
	}
}

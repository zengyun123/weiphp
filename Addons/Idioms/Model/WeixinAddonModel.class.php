<?php
        	
namespace Addons\Idioms\Model;
use Home\Model\WeixinModel;
        	
/**
 * Idioms的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Idioms' ); // 获取后台插件的配置参数	
		$api='http://i.itpk.cn/api.php?question=@cy';
		if($dataArr['Content']=='成语接龙'){
			$keywordArr['step']='input';
			set_user_status('Idioms',$keywordArr);
			$this->replyText('成语接龙开启，你现在可以输入成语了');
		}
		if($keywordArr['step']=='input'){
			if($dataArr['Content']=='退出'){
				$this->replyText('已经退出游戏');
				return false;
			}
			$reply=file_get_contents($api.$dataArr['Content']);
			if($reply=='成语必须为4个汉字'||$reply=='别来骗人家，不是随便打4个字就是成语哒！'){				
				$keywordArr['step']='input';
				set_user_status('Idioms',$keywordArr);
				$this->replyText($reply.'重新输入下一个成语。[退出]退出成语接龙');
			}else{
				$keywordArr['step']='input';
				set_user_status('Idioms',$keywordArr);				
				$this->replyText($reply);
			}
			
			
		}
	}
}
        	
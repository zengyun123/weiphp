<?php
        	
namespace Addons\tuling\Model;
use Home\Model\WeixinModel;
        	
/**
 * tuling的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'tuling' ); // 获取后台插件的配置参数	
		$apiurl='http://www.tuling123.com/openapi/api';
                $apikey='cee7cceecfa35e3a21d6e1483853f8b0';
                $openid=  get_openid();
                if($dataArr['Content']=='tuling'){
                    $keywordArr['step']='input';
                    set_user_status('tuling',$keywordArr);
                    $this->replyText('已经启动智能机器人。现在可以对话了');
                }               
                if($keywordArr['step']=='input'){
                    $voice=getRevVoice();
                    $the_talk=$voice['recognition'];
                    
                    
                    if(strstr($the_talk,'退出')){
                        $this->replyText('退出成功');
                        return false;
                    }else{
                    $url=$apiurl.'?key='.$apikey.'&info='.$the_talk.'&userid='.$openid;                    
                    set_user_status('tuling',$keywordArr);
                   
                    $messign = json_decode ( http_get ( $url ), true );
                    $this->replyText($messign['text']);
                    }
                }
	}
}
        	
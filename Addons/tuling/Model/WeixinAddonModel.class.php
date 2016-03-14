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
                   
                    $message = json_decode ( http_get ( $url ), true );
                   // $this->replyText($message['text']);
                    switch($message['code']){
                        case 100000:
                            $this->replyText($message['text']);
                            break;
                        case 200000:
                           //  $url='<a href="'.$message['url'].'">点击查看排行</a>'."\n";
                            $url='<a href="'.$message['url'].'">点我、点我，就能看见了哦~~</a>';
                            $this->replyText($message['text']."\n".$url);
                            break;
                        case 302000:
                            $text=$message['text'];
                            $rand=rand(0,8);
                            $list=$message['list'][$rand];                           
                            $arrnew[0]=array(
                                'Title'=>$list['article'],
                                'Description'=>'内容来自'.$list['source'],
                                'Url'=>$list['detailurl']
                                
                            );
                            $this->replyNews($arrnew);
                            break;
                        case 308000:
                            $rand=rand(0,8);
                            $list=$message['list'][$rand];
                            $arr[0]=array(
                                'Title'=>$list['name'],
                                'PicUrl'=>$list['icon'],
                                'Description'=>$list['info'],
                                'Url'=>$list['detailurl'],
                                
                            );
                            $this->replyNews($arr);
                            
                    }
                    }
                }
	}
}
        	
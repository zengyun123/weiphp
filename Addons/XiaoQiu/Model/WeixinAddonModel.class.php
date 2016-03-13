<?php
        	
namespace Addons\XiaoQiu\Model;
use Home\Model\WeixinModel;
        	
/**
 * XiaoQiu的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'XiaoQiu' ); // 获取后台插件的配置参数	
                $param['openid']=  get_openid();
                if($param['openid']!='oq3rHsw-PefXwoChyJ3RSz-mvv7A'){
                    $this->replyText('身份验证失败！');
                    return false;
                }
		if($dataArr['Content']=='XiaoQiu'){
			$keywordArr['step']='input';
			set_user_status('XiaoQiu',$keywordArr);
                        $login_text='身份验证成功'."\n".'----------'."\n".'Hi Sir'."\n".'接下来我们做点什么!';
			$this->replyText($login_text);
			
		}
		if($keywordArr['step']=='input'){
                    if($dataArr['Content']=='q'){
                        $this->replyText('退出成功');
                        return false;
                    }else{
                    $message_type=getRevType();          
                    $voice=getRevVoice();
                    $the_talk=$voice['recognition'];                   
                    
                    if(strstr($the_talk,"退出")){
                        $this->replyText('已经退出ㄑㄧㄡ机器人模式！');
                        return false;
                    }else{
                        $keywordArr['step']='input';
                        set_user_status('XiaoQiu',$keywordArr);	
                        $content='今天没有提醒事项！'."\n".'●数据库更新14条'."\n".'●你好像改写过'."\n".'-----↓-------↓-----'."\n".'·WeixinAddonModel.class.php'."\n".'·XiaoQiuModel.class.php'."\n".'--------------------'."\n".'●服务器运行正常'."\n".'●网速正常'."\n".'●没有检测到恶意攻击'."\n".'--------------------'."\n".'Sir 还有什么能帮到你！';
                        $this->replyText ($content);
                    }
                    }
			
		}
	}
}
        	
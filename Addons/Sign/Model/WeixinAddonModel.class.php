<?php
        	
namespace Addons\Sign\Model;
use Home\Model\WeixinModel;
        	
/**
 * Sign的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Sign' ); // 获取后台插件的配置参数	
		//dump($config);
               $param['openid']=get_openid();
               $param['token']=get_token();
               S('openid',$param['openid']);
               S('token',$param['token']);
               $nowdate=date('Y-m-d',time());
              $url=addons_url("Sign://Sign/index");
             $link='<a href="'.$url.'">点击查看排行</a>'."\n";
               $user_info=M('public_follow')->where($param)->find();
               $sign_info_sql=array(
                   'token'=>$param['token'],
                   'openid'=>$param['openid'],  
              
               );
               $sign_info_sql_add=array(
                   'token'=>$param['token'],
                   'openid'=>$param['openid'],
                   'signtime'=>time(),
                   'uid'=>$user_info['uid'],                 
                   'date'=>date('Y-m-d',time())
                   
               );
               
               $date_time_now=date('Y-m-d',time());
               $sign_all_info=M('Sign')->where($sign_info_sql)->order('id DESC')->find();
               $sign_ranking=M('Sign')->order('signtime DESC')->select();
               $sign_time=date('Y-m-d',$sign_all_info['signtime']);
               $sign_cache=M('cache_sign')->where($param)->find();
               if($sign_time==$date_time_now){        
                   
                   $content='你已经签到了！'."\n"."\n".date('Y-m-d H:i:s',$sign_all_info['signtime'])."\n"."\n".$link."\n".'连续签到：'.$sign_cache['signlink'].'天'."\n".'累计签到：'.$sign_cache['signcount'].'天';
                   
                   $this->replyText($content);
                   
               }else{
                  $uid=array(
                      'uid'=>$user_info['uid']
                      
                  );
                  $score=M('user')->where($uid)->find();
                  $save_data=array(
                      'score'=>$score['score']+10
                  );
                  $sign_cache=M('cache_sign')->where($uid)->find();
                 
                  $save=M('user')->where($uid)->save($save_data);
                  $add=M('Sign')->data($sign_info_sql_add)->add();
                  $sign_link=  sign_link($param['openid']);
                  $sign_rank=  sign_ranking($sign_info_sql);
                   if(empty($sign_cache)){
                       $sign_count=array(
                           'signlink'   =>  $sign_link,
                           'signcount'   =>  $sign_rank,
                           'uid'    =>  $user_info['uid']
                           
                       );
                    
                    $sign_cache_add=M('cache_sign')->data($sign_count)->add();
               
                  }else{
                      $sign_count=array(
                          'signlink'    =>$sign_link,
                          'signcount'   =>$sign_rank,
                          'uid'         =>$user_info['uid'],
                      );
                      $sign_cache_save=M('cache_sign')->where($param)->save($sign_count);
                  }
                  $sign_end_info=M('sign')->where($param)->order('id DESC')->find();
                 $sign_end_cache=M('cache_sign')->where($uid)->find();
                  $content='签到成功！'."\n"."\n".date('Y-m-d H:i:s',$sign_end_info['signtime'])."\n"."\n".$link."\n".'连续签到：'.$sign_end_cache['signlink'].'天'."\n".'累计签到：'.$sign_end_cache['signcount'].'天';
                  $this->replyText($content);
                  exit();
               }
            
	}
}
        	
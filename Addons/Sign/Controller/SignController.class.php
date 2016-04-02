<?php

namespace Addons\Sign\Controller;
use Home\Controller\AddonsController;

class SignController extends AddonsController{
	function _initialize() {
		$act = strtolower ( _ACTION );
		$type = I ( 'type' );
		
		$res ['title'] = '签到记录';
		$res ['url'] = addons_url ( 'Sign://Sign/lists' );
		$res ['class'] = $act == 'lists' || $type == 'text' ? 'current' : '';
		$nav [] = $res;
		
		$res ['title'] = '连签排行';
		$res ['url'] = addons_url ( 'Sign://Sign/link' );
		$res ['class'] = $act == 'news' || $type == 'news' ? 'current' : '';
		$nav [] = $res;
		
		$res ['title'] = '总签排行';
		$res ['url'] = addons_url ( 'Sign://Sign/count' );
		$res ['class'] = $act == 'image' || $type == 'image' ? 'current' : '';
		$nav [] = $res;
		
		$this->assign ( 'nav', $nav );
	}
	function lists() {
                $this->assign ( 'add_button', false );
                $this->assign ( 'del_button', false );
                $this->assign ( 'check_all', false );                
		$model = $this->getModel ();
                $list_data = $this->_get_model_list ( $model );
		
		$this->assign ( $list_data );
		$this->display ();
	}
        function index(){ 
            echo '<meta charset="utf-8">';
            $oauth_unionid= wxauth_unionid('http://wechat.ekeylee.com/index.php?s=/addon/Sign/Sign/index.html');
            $info['unionid']=$oauth_unionid['unionid'];
            $_userinfo=M('user')->where($info)->find();
        
            if($_userinfo){                
                $userinfo=M('public_follow')->where('uid='.$_userinfo['uid'])->find();              
                $param['token']=$userinfo['token'];
                $date=date('Y-m-d',time());
                $param['date']=$date;
                $sign_list=M('sign')->where($param)->order('signtime ASC')->limit('10')->select();
                foreach($sign_list as $k=>$v){ 
                    
                if(array_search($_userinfo['uid'],$v,true)=='uid'){
                   
                   $this->assign('message','');
                   break;
                    }else{
                         $this->assign('message','(你今日没有上榜!)');
                         break;
                    }
               }
                $this->assign('sign_list',$sign_list);//今日签到排名 区分了token
                $sign_info=M('cache_sign')->where('uid='.$_userinfo['uid'])->find();
                $this->assign('sign_info',$sign_info);//个人连签和积分详细情况
                $this->assign('oauth_info',$oauth_unionid);
                $ranking=  sign_ranking_all($_userinfo['uid'],$param['token']);
                $this->assign('ranking',$ranking);
                $this->display();      
            }else{
                $this->assign('info',$oauth_unionid);
                $param['token']='gh_8fc878db07c6';//指定了游客访问的公众号【景圣生活】
                $date=date('Y-m-d',time());
                $param['date']=$date;
                $sign_list=M('sign')->where($param)->order('signtime ASC')->limit('10')->select();
  
                $this->assign('userinfo',$oauth_unionid);
                $this->assign('sign_list',$sign_list);//今日签到排名 区分了token  
               $this->display('error');
            }                      
        }
        
        function zph(){
           echo '<meta charset="utf-8">';
            $oauth_unionid= wxauth_unionid('http://wechat.ekeylee.com/index.php?s=/addon/Sign/Sign/zph.html');
            $info['unionid']=$oauth_unionid['unionid'];
           $_userinfo=M('user')->where($info)->find();
           $uid['uid']=$_userinfo['uid'];
           $userinfo=M('public_follow')->where($uid)->find(); 
           $param['token']=$userinfo['token'];
           $cache_sign=M('cache_sign')->where($param)->order('score DESC')->limit('10')->select();           
                foreach($cache_sign as $k=>$v){ 
                if(array_search($_userinfo['uid'],$v,true)=='uid'){
                    $this->assign('message','');
                   
                    break;
                    }else{
                     $this->assign('message','(你今日没有上榜!)');   
                    break;
                    }
               }
           
            $sign_self=M('cache_sign')->where($uid)->find();
            $this->assign('user_self',$sign_self);
            $this->assign('oauth_info',$oauth_unionid);
           $this->assign('zph_list',$cache_sign);
           $this->assign('ranking',sign_ranking_all($uid['uid'],$userinfo['token']));
            $this->display();
        }
        
        function lq(){
            echo '<meta charset="utf-8">';
            $oauth_unionid= wxauth_unionid('http://wechat.ekeylee.com/index.php?s=/addon/Sign/Sign/lq.html');
            $info['unionid']=$oauth_unionid['unionid'];     
            $_userinfo=M('user')->where($info)->find();
            $uid['uid']=$_userinfo['uid'];
            $userinfo=M('public_follow')->where($uid)->find();
            $param['token']=$userinfo['token'];
            $cache_sign=M('cache_sign')->where($param)->order('signlink DESC')->limit('10')->select();
            $sign_self=M('cache_sign')->where($uid)->find();
            $this->assign('ranking',sign_ranking_all($uid['uid'],$userinfo['token']));
            $this->assign('user_self',$sign_self);
            $this->assign('lq_list',$cache_sign);
            $this->display();
        }
        

}

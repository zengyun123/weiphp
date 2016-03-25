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
            $uid=I('uid');
            $uid_data=array(
                'uid'=>$uid,
            );
            $userinfo=M('public_follow')->where($uid_data)->find();        
            $param['token']=$userinfo['token'];
            $param['openid']=$userinfo['openid'];
            $date=date('Y-m-d',time());
            $date_arr=array(
                'token'=>$param['token'],
                'date'=>$date,
            );
            $sign_list=M('sign')->where($date_arr)->order('signtime ASC')->limit('10')->select();            
            $sign_self=M('cache_sign')->where($uid_data)->find();
            $this->assign('user_self',$sign_self);
            $this->assign('sign_list',$sign_list);
            $this->assign('ranking',sign_ranking_all($uid,$param['token']));

        $this->display();
        }
        
        function zph(){
           echo '<meta charset="utf-8">';
           $uid['uid']=I('uid');
           $userinfo=M('public_follow')->where($uid)->find(); 
           $param['token']=$userinfo['token'];
           $cache_sign=M('cache_sign')->where($param)->order('score DESC')->limit('10')->select();
            $sign_self=M('cache_sign')->where($uid)->find();
            $this->assign('user_self',$sign_self);
           $this->assign('zph_list',$cache_sign);
           $this->assign('ranking',sign_ranking_all($uid['uid'],$userinfo['token']));
            $this->display();
        }
        
        function lq(){
            echo '<meta charset="utf-8">';
            $uid['uid']=I('uid');
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

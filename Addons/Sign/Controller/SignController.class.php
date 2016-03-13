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
		// dump($list_data);

		$this->display ();
	}
        function index(){
            echo '<meta charset="utf-8">';
            $token=S('token');
            $openid=S('openid');
            
            $date=date('Y-m-d',time());
            $user_info_data=array(
                'token'=>$token,
                'openid'=>$openid
            );
            $date_arr=array(
                'token'=>$token,
                'date'=>$date,
            );
            $sign_list=M('sign')->where($date_arr)->order('signtime ASC')->select();
            $user_follow=M('public_follow')->where($user_info_data)->find();
            $cache_data=array(
                'uid'=>$user_follow['uid']
            );
            $sign_self=M('cache_sign')->where($cache_data)->find();
            $this->assign('user_self',$sign_self);
            $this->assign('sign_list',$sign_list);
            $this->assign('ranking',sign_ranking_all($user_follow['uid']));
            
        $this->display();
        }
        

}

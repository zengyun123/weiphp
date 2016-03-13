<?php

namespace Addons\DayQuestion\Controller;
use Home\Controller\AddonsController;

class DayQuestionController extends AddonsController{
    function _initialize() {
        parent::_initialize();
		
        $controller = strtolower ( _ACTION );
		
        $res ['title'] = '添加内容';
        $res ['url'] = addons_url ( 'DayQuestion://DayQuestion/lists' );
        $res ['class'] = $controller == 'lists' ? 'current' : '';
        $nav [] = $res;
                
        $res ['title'] = '流水信息';
        $res ['url'] = addons_url ( 'DayQuestion://DayQuestion/info' );
        $res ['class'] = $controller == 'info' ? 'current' : '';
        $nav [] = $res;
		
        $this->assign ( 'nav', $nav );
	}
        
        function lists(){
            $model=$this->getModel('dayquestion');
            $list_data = $this->_get_model_list ( $model );
            $this->assign ( $list_data );
            $this->display ();            
        }
        function info(){
            $this->assign ( 'add_button', false );
            $this->assign ( 'del_button', false );
            $this->assign ( 'check_all', false );
            $model=$this->getModel('dayquestion_cache');
            parent::common_lists ( $model, $page, 'lists' );
        }
}

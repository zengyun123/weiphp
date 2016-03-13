<?php

namespace Addons\DayLuck;
use Common\Controller\Addon;

/**
 * 每日抽奖插件
 * @author Ekey.Lee
 */

    class DayLuckAddon extends Addon{

        public $info = array(
            'name'=>'DayLuck',
            'title'=>'每日抽奖',
            'description'=>'这是一个临时描述',
            'status'=>1,
            'author'=>'Ekey.Lee',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/DayLuck/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/DayLuck/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
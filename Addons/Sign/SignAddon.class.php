<?php

namespace Addons\Sign;
use Common\Controller\Addon;

/**
 * 签到插件
 * @author 无名
 */

    class SignAddon extends Addon{

        public $info = array(
            'name'=>'Sign',
            'title'=>'签到',
            'description'=>'签到 适用于weiphp 3.0',
            'status'=>1,
            'author'=>'Ekey.Lee',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/Sign/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Sign/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
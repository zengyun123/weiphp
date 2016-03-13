<?php

namespace Addons\SignIn;
use Common\Controller\Addon;

/**
 * 签到插件
 * @author Ekey.lee
 */

    class SignInAddon extends Addon{

        public $info = array(
            'name'=>'SignIn',
            'title'=>'签到',
            'description'=>'每日签到',
            'status'=>1,
            'author'=>'Ekey.lee',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/SignIn/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/SignIn/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
<?php

namespace Addons\tuling;
use Common\Controller\Addon;

/**
 * 图灵机器人插件
 * @author Ekey.Lee
 */

    class tulingAddon extends Addon{

        public $info = array(
            'name'=>'tuling',
            'title'=>'图灵机器人',
            'description'=>'最新图灵API',
            'status'=>1,
            'author'=>'Ekey.Lee',
            'version'=>'0.1',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/tuling/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/tuling/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
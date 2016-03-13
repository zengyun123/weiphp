<?php

namespace Addons\Vjob;
use Common\Controller\Addon;

/**
 * 微招聘插件
 * @author 绿墨白
 */

    class VjobAddon extends Addon{

        public $info = array(
            'name'=>'Vjob',
            'title'=>'微招聘',
            'description'=>'微招聘，功能简单，发布微招聘信息，可设置关键字触发！',
            'status'=>1,
            'author'=>'绿墨白',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/Vjob/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Vjob/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
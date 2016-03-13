<?php

namespace Addons\XiaoQiu;
use Common\Controller\Addon;

/**
 *  小秋智能机器人插件
 * @author Ekeylee
 */

    class XiaoQiuAddon extends Addon{

        public $info = array(
            'name'=>'XiaoQiu',
            'title'=>' 小秋智能机器人',
            'description'=>'小秋智能机器人 Version 1.0 ',
            'status'=>1,
            'author'=>'Ekeylee',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/XiaoQiu/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/XiaoQiu/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
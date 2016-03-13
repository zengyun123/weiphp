<?php

namespace Addons\Idioms;
use Common\Controller\Addon;

/**
 * 成语接龙插件
 * @author Ekeylee
 */

    class IdiomsAddon extends Addon{

        public $info = array(
            'name'=>'Idioms',
            'title'=>'成语接龙',
            'description'=>'这是一个临时描述',
            'status'=>1,
            'author'=>'Ekeylee',
            'version'=>'0.1',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/Idioms/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Idioms/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
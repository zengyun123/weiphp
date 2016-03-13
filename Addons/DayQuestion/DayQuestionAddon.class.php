<?php

namespace Addons\DayQuestion;
use Common\Controller\Addon;

/**
 * 每日一题插件
 * @author Ekeylee
 */

    class DayQuestionAddon extends Addon{

        public $info = array(
            'name'=>'DayQuestion',
            'title'=>'每日一题',
            'description'=>'看图猜成语',
            'status'=>1,
            'author'=>'Ekeylee',
            'version'=>'0.1',
            'has_adminlist'=>1
        );

	public function install() {
		$install_sql = './Addons/DayQuestion/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/DayQuestion/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
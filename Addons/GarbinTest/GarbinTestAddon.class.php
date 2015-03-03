<?php

namespace Addons\GarbinTest;
use Common\Controller\Addon;

/**
 * 测试微信插件插件
 * @author 无名
 */

    class GarbinTestAddon extends Addon{

        public $info = array(
            'name'=>'GarbinTest',
            'title'=>'测试微信插件',
            'description'=>'测试插件',
            'status'=>1,
            'author'=>'无名',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/GarbinTest/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/GarbinTest/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }
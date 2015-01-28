<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class AdminController extends Controller {
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->error('访问的地址不存在',  U('Index/index'));
	}

    protected function _initialize(){
        //验证登陆,没有登陆则跳转到登陆页面
        if(session('?admid') == false) {
            $this->redirect('Admin/Login/index');
        }

        //权限验证
//        if(!authCheck(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,session('admid'))){
//            $this->error('你没有权限!');
//        }
        $this->assign('sitename', C('SITE_NAME'));
        $this->assign('admname', session('admname'));
        $this->assign('admtitle', session('admtitle'));
    }
}

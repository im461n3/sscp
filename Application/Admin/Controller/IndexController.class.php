<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AdminController {
    public function index(){
        $this->assign('webtitle', '管理首页');
        $this->display();
    }
}
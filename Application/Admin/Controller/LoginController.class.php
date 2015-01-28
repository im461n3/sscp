<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        $this->display();
    }

    //生成验证码
    public function verify()
    {
        $verify = new \Think\Verify();
        $verify->codeSet = '0123456789';
        $verify->fontSize = 17;
        $verify->length = 4;
        $verify->imageH = 44;
        $verify->useCurve = false;
        $verify->useNoise = true;
        $verify->entry();
    }

    //登录验证
    public function doLogin()
    {
        $code = I('code');
        $verify = new \Think\Verify();
        if ($verify->check($code)) {
            $Admin = D("Admin");
            $condition['admname'] = I('usr_name');
            $adm = $Admin->where($condition)->find();
            if (is_array($adm)) {
                if (I('usr_password') == $adm['admpwd']) {
                    session('admid', $adm['admid']);
                    session('admname', $adm['admname']);
                    session('admtitle', $adm['admtitle']);
                    $this->success('登录成功!', U('Admin/Index/index'));
                    return;
                }
            }
            $this->error('账号或密码错误!', U('Admin/Login/index'));
        } else {
            $this->error('验证码错误!', U('Admin/Login/index'));
        }
    }

    //退出
    public function logout()
    {
        session(null);
        $this->success('退出成功!', U('Admin/Index/index'));
    }
}
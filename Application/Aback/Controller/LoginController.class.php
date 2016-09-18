<?php

namespace Aback\Controller;

use Think\Controller;

class LoginController extends Controller {

  public function index() {
    $this->display();
  }

  /**
   * 进行登录
   */
  public function loginto() {
    $uname = I('username');
    $pass = I('password');
    $cmd5 = think_ucenter_decrypt($pass, AGENT_MD5_KEY);
    $Agent = D('agent');
    $res = $Agent->login_user(array('uname' => $uname, 'upass' => $cmd5));
    if (!empty($res)) {
      session('is_login', $res);
      $this->redirect('Index/index');
    } else {
      $this->redirect('Login/index');
    }
  }

  /**
   * 退出登录
   */
  public function loginout() {
    session('is_login', null);
    $this->redirect("Login/index");
  }

  /**
   * 创建test用户
   */
  public function createfirst() {
    $cmd5 = think_ucenter_encrypt('admin', AGENT_MD5_KEY, 10);
    $_map = array('uname' => 'admin', 'upass' => $cmd5, 'uctime' => time(), 'uutime' => time(),);
    $Agent = D('agent');
    $res = $Agent->create_user($_map);
    print_r($res);
    if ($res || !$res) {
      $this->redirect('Login/index');
    }
  }

}

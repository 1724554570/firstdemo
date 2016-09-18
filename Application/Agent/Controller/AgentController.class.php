<?php

namespace Agent\Controller;

use Think\Controller;

class AgentController extends Controller {

  //前置操作方法
  public function _initialize() {
    $this->assign('agentTitle', 'AdminLTE 2 | Dashboard');
    if (empty($_SESSION['is_login'])) {
      $this->redirect("Login/index");
    }
  }

}

<?php

namespace Agent\Controller;

class UsersController extends AgentController {

  /**
   * 列表
   */
  public function index() {
    $user = D('users');
    $list = $user->lists();
    $this->assign('list', $list);
    $this->display();
  }

  public function setcreate() {
    $user = D('users');
    for ($i = 0; $i < 50; $i++) {
      $data = $user->createUsers($i);
      print_r($data);
      echo '<br>';
    }
  }

}

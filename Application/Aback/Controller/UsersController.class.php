<?php

namespace Aback\Controller;

class UsersController extends AgentController {

  /**
   * 列表
   */
  public function index() {
    $page = I('page');
    $page = (empty($page)) ? 1 : $page;
    $searchV = I('searchname');
    $user = D('users');
    $list = $user->lists($page, $searchV);
    $totalRows = $user->getCount();
    $pageView = is_Panging($totalRows['c'], $page);
    $this->assign("pageView", $pageView);
    $this->assign("showpage", $page);
    $this->assign('searchValue', $searchV);
    $this->assign('list', $list);
    //$content = $this->fetch('Users:index');
    //$this->show($content, 'utf-8', 'text/xml');
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

<?php

namespace Agent\Controller;

class IndexController extends AgentController {

  public function index() {
    //$htmls = '<div class=\'Welcome\'><span class="STYLE1">Welcome To <br>EF Game Management </span><span class="STYLE1"> System</span><br><br>请点击左侧的菜单对网站进行管理！ </div>';
    $htmls = '<div class=\'Welcome\'><span class="STYLE1">Welcome To <br>Management </span><span class="STYLE1"> System</span><br><br>请点击左侧的菜单对网站进行管理！ </div>';
    $this->assign("htmls", $htmls);
    //$this->display("Index:main");
    $this->display();
  }

}

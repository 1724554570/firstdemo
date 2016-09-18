<?php

        const AGENT_MD5_KEY = 'KEYS'; // 字符加密默认值
        const USERS_MD5_KEY = 'users'; // 用户中心加密默认值

/**
 * 计算页数
 * @param type $page
 * @return int
 */
function getNums($page) {
  $max = 20;
  $start = ($page - 1) * $max;
  $data = array("startnum" => $start, "endnum" => $max);
  return $data;
}

/**
 * 分页器,
 * @param type $count
 * @param type $page
 * @param type $maxcount
 * @param type $mincount
 * @return type
 */
function is_Panging($count = 0, $page = 0, $maxcount = 20, $mincount = 0) {
  $totalPages = ceil($count / $maxcount);
  if (!empty($totalPages) && $page > $totalPages) {
    $page = $totalPages;
  }
  $tt = ($totalPages < 1) ? 1 : $totalPages;
  $countsPage = "<li class=\"\"><span class=\"prev\">共 {$tt} 页--当前第 {$page} 页</span></li>";
  // 上一页
  $up_row = $page - 1;
  $up_page = "<li class=\"gotopage\"  data-page=\"{$up_row}\"><a href=\"javascript:void(0);\" class=\"prev\">上一页</a></li>";
  // 下一页
  $down_row = $page + 1;
  $down_page = ($down_row <= $totalPages) ?
          "<li class=\"gotopage\" data-page=\"{$down_row}\"><a href=\"javascript:void(0);\" class=\"page-link next\">下一页</a></li>" :
          "<li class=\"gotopage\" data-page=\"{$page}\"><a href=\"javascript:void(0);\" class=\"page-link next\">下一页</a></li>";
  // 首页
  $the_first = "";
  if ($totalPages >= 1) {
    $the_first = "<li class=\"gotopage\"  data-page=\"1\"><a href=\"javascript:void(0);\" class=\"prev\">首页</a></li>";
  }
  // 尾页
  $the_end = "";
  if ($totalPages > 1) {
    $the_end = "<li class=\"gotopage\"  data-page=\"{$totalPages}\"><a href=\"javascript:void(0);\" class=\"page-link next\">尾页</a></li>";
  }
  $resList = ($countsPage . $the_first . $up_page . $down_page . $the_end);
  return $resList;
}

function setPages($count = 0, $page = 1, $maxcount = 20) {
  $totalPages = ceil($count / $maxcount);
  if ($page > $totalPages) {
    $page = $totalPages;
  }
  $tt = ($totalPages < 1) ? 1 : $totalPages;
  // 上一页 
  if ($page) {
    
  }
}

/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 (单位:秒)
 * @return string 
 */
function think_ucenter_encrypt($data, $key, $expire = 0) {
  $key = md5($key);
  $data = base64_encode($data);
  $x = 0;
  $len = strlen($data);
  $l = strlen($key);
  $char = '';
  for ($i = 0; $i < $len; $i++) {
    if ($x == $l)
      $x = 0;
    $char .= substr($key, $x, 1);
    $x++;
  }
  $str = sprintf('%010d', $expire ? $expire + time() : 0);
  for ($i = 0; $i < $len; $i++) {
    $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1))) % 256);
  }
  return str_replace('=', '', base64_encode($str));
}

/**
 * 系统解密方法
 * @param string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param string $key  加密密钥
 * @return string 
 */
function think_ucenter_decrypt($data, $key) {
  $key = md5($key);
  $x = 0;
  $data = base64_decode($data);
  $expire = substr($data, 0, 10);
  $data = substr($data, 10);
  if ($expire > 0 && $expire < time()) {
    return '';
  }
  $len = strlen($data);
  $l = strlen($key);
  $char = $str = '';
  for ($i = 0; $i < $len; $i++) {
    if ($x == $l)
      $x = 0;
    $char .= substr($key, $x, 1);
    $x++;
  }
  for ($i = 0; $i < $len; $i++) {
    if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
      $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
    } else {
      $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
    }
  }
  return base64_decode($str);
}

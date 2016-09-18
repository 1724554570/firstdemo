<?php

namespace Agent\Model;

use Think\Model;

/**
 * 后台管理 用户信息
 */
class UsersModel extends Model {

  const tbname = 'tb_users';
  const USERS_STATE_0 = 0;
  const USERS_STATE_1 = 1;
  const USERS_STATE_2 = 2;
  const USERS_STATE_3 = 3;

  /**
   * 赋值注册
   * @param type $name
   * @param type $logo
   * @param type $tel
   * @param type $pass
   * @param type $types
   * @return type
   */
  public function setMapsValue($name, $logo, $tel, $pass, $types = false) {
    $data = array('nickname' => $name, 'mlogo' => $logo, 'mtel' => $tel, 'mpass' => $pass,);
    if ($types) {
      $data['utime'] = time();
    } else {
      $data['ctime'] = time();
      $data['utime'] = $data['ctime'];
    }
    $res = $this->add($data);
    return $res;
  }

  /**
   * 赋值查询
   * @param type $name
   * @param type $pass
   * @param type $types
   */
  public function getMapValue($name, $pass, $types = false) {
    if (empty($name) || empty($pass)) {
      return -1;
    }
    $pass = think_ucenter_decrypt($pass, USERS_MD5_KEY);
    $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
    $sql = "select * from tb_users where 1 ";
    $sql.="and name = {$name} and pass = {$pass} ";
    $res = $Model->query($sql);
    return $res;
  }

  /**
   * 创建用户
   */
  public function createUsers($i = 0) {
    $pass = think_ucenter_encrypt('admin' . $i, USERS_MD5_KEY, 10);
    $data = self::setMapsValue('admin' . $i, $i, '12345678901', $pass);
    return $data;
  }

  /**
   * 登录
   */
  public function loginUsers() {
    
  }

  /**
   * 返回数据总数
   * @param type $search
   * @return type
   */
  public function getCount($search) {
    $sql = "select count(*) as c from " . self::tbname . "";
    if (!empty($search)) {
      $sql.=" where nickname like '%{$search}%'";
    }
    $model = new Model();
    $res = $model->query($sql);
    return $res[0];
  }

  /**
   * sql 查询数据
   * @return type
   */
  public function lists($page, $search = '') {
    $model = new Model();
    $tbname = self::tbname;
    $sql = "select * from {$tbname} where 1";
    if (!empty($search)) {
      $sql.=" and nickname like '%{$search}%'";
    }
    $limit = '0,20';
    if (!empty($page)) {
      $st = getNums($page);
      $limit = "{$st['startnum']},{$st['endnum']}";
    }
    $sql.= " and uid > 0 order by ctime asc limit {$limit} ";
    $res = $model->query($sql);
    return $res;
  }

}

<?php

namespace Agent\Model;

use Think\Model;

/**
 * 后台管理 销售
 */
class AgentModel extends Model {

  // 操作状态
  const MODEL_INSERT = 1;      //  插入模型数据
  const MODEL_UPDATE = 2;      //  更新模型数据
  const MODEL_BOTH = 3;      //  包含上面两种方式
  const MUST_VALIDATE = 1;      // 必须验证
  const EXISTS_VALIDATE = 0;      // 表单存在字段则验证
  const VALUE_VALIDATE = 2;      // 表单值不为空则验证

  // 字段映射
  protected $_map = array(
      'aid' => 'agent_id',
      'uname' => 'agent_name',
      'upass' => 'agent_pass',
      'upower' => 'agent_power',
      'uctime' => 'agent_ctime',
      'uutime' => 'agent_utime',
      'ustate' => 'agent_state',
      'lastlogin' => 'agent_lastlogin',
  );
  
  // 验证数据格式
  protected $_validate = array(
      array('uname', '1,30', -1, self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
      array('upass', '1,50', -2, self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
  );

  /**
   * 创建用户
   * @param type $data 数据源
   * @return type
   */
  public function create_user($data = '') {
    if (empty($data)) {
      return false;
    }
    $map = array('uname' => $data['uname'], 'upass' => $data['upass'], 'uctime' => $data['uctime'], 'uutime' => $data['uutime'],);
    /* 添加用户 */
    if ($this->create($map)) {
      $finds = $this->find(array('uname' => $data['uname'], 'upass' => $data['upass']));
      if (empty($finds)) {
        $uid = $this->add();
        return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
      } else {
        return $finds['aid'];
      }
    } else {
      return $this->getError(); //错误详情见自动验证注释
    }
  }

  /**
   * 登录用户
   * @param type $data 数据源
   * @return boolean
   */
  public function login_user($data = '') {
    if (empty($data)) {
      return array();
    }
    $finds = $this->find(array('uname' => $data['uname'], 'upass' => $data['upass']));
    if ($finds) {
      $this->save(array('lastlogin' => time()), array('aid' => $finds['aid']));
      unset($finds['upass']);
      unset($finds['uctime']);
      unset($finds['uutime']);
      return $finds;
    } else {
      return array();
    }
  }

}

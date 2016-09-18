<?php

return array(
    //'配置项'=>'配置值'
    'URL_CASE_INSENSITIVE' => true, //解决URL大小写
    'SESSION_AUTO_START' => true, //是否开启session
    
    'URL_MODEL' => '2', //URL模式
    'URL_PATHINFO_DEPR' => '_',
    
    // 多个伪静态后缀设置 用|分割
    'URL_HTML_SUFFIX' => 'html|shtml|xml',
    //'URL_DENY_SUFFIX' => 'pdf|ico|png|gif|jpg', // URL禁止访问的后缀设置
    'TMPL_TEMPLATE_SUFFIX'=>'.phtml',
    
    /* 数据库配置 */
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'thshop', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'tb_', // 数据库表前缀
);

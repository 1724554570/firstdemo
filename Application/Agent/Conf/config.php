<?php

return array(
    //'配置项'=>'配置值'
    'READ_DATA_MAP' => true,
    'TMPL_TEMPLATE_SUFFIX' => '.phtml',
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static_bk',
        '__IMG__'    => __ROOT__ . '/Public/static_bk/img',
        '__CSS__'    => __ROOT__ . '/Public/static_bk/style',
        '__JS__'     => __ROOT__ . '/Public/static_bk/script',
        '__bootstrap__'     => __ROOT__ . '/Public/AdminLTE-2.3.6/bootstrap',
        '__plugins__'     => __ROOT__ . '/Public/AdminLTE-2.3.6/plugins',
        '__AdminLTE__'     => __ROOT__ . '/Public/AdminLTE-2.3.6/dist',
    ),
);

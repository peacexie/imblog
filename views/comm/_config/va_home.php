<?php
/*
 * 首页模板和通用配置
/*/
$_va_home = array(

    //config配置
    'c' => array(
        'vmode' => 'dynamic', //dynamic,static,close(关闭)
        'stext' => '.html', //后缀: .html, .htm, .shtm, -a.htm, -m.htm, .shtml, .stm,
        'stexp' => '2h', //静态更新周期：600s,30,2h,24h,7d, 默认单位为分钟
        //'_defCtrl' => '_defCtrl', 
        'imcfg' => array(),
        'extra' => array(),
    ),
    
    //mod.home模块首页模板
    'm' => 'home/mhome',

);

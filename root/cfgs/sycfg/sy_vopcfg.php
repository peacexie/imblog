<?php
//模板显示格式

$_sy_vopcfg = array();

// 所有语言
$_sy_vopcfg['langs'] = array(
    'en' => array(
        'English',  
        'En'
    ),
    'cn' => array(
        '中文版',  
        '中'
    ), 
);

// 所有模板
$_sy_vopcfg['tpl'] = array(
    'adm' => array(
        array('cn'=>'管理中心', 'en'=>'Admin'),
        '/root/run/adm.php',
    ),
    'comm' => array(
        '贴心博客',
        '/home.php', // /home.php, /main.php
        //'/', // 伪静态配置：把`.php?` ->替换为 `/`
        //'.htm', // 伪静态后缀
    ), 
    'base' => array(
        array('cn'=>'默认首页', 'en'=>'Basic'),
        '/index.php', // index,base
    ),
    //'ven' => array('English','/root/run/eng.php'), 
);

// 各模块展示show
$_sy_vopcfg['show'] = array( 
    //'chn' => array('',''), // topic,faqs
    '_defront_' => 'comm', //默认展示模板
    '_deadmin_' => 'adm', //默认管理模板
    '_hidden_' => array('adminer','inmem'), //无展示模块
);

<?php
(!defined('RUN_INIT')) && die('No Init');
// supml -> setup-multi-language

// ### 演示数据 ------------------------

$_demo_tabs = array(
    'dext_info', 'docs_info', 
    'coms_wall',
    // 
    'dext_demo', 'docs_demo', 
    'dext_news', 'docs_news', 
);

// ### 文件替换 ------------------------

$_files[] = array(
    'dir' => DIR_ROOT,
    'file' => '/cfgs/boot/const.php',
    'tabs' => array(
        // part
        '便笺墙' => 'Memo-Wall',
        '心情墙' => 'Mood',
        '许愿墙' => 'Wish',
        '和平鸽小语' => 'Words',
        // lang
        "'cn';" => "'en';",
    ),
    'skip' => 'cn',
);
$_files[] = array(
    'dir' => DIR_PROJ,
    'file' => '/home.php',
    'tabs' => array(
        // lang
        "'cn';" => "'en';",
    ),
    'skip' => 'cn',
);

// ### db-table替换 ------------------------

$_dbtabs[] = array(
    'table' => 'base_catalog',
    'kfield' => 'kid',
    'keys' => array(
        'i1012',
        'i1014',
        'i1016',
        'i1018',
        'i1020',
        'i1022',
    ),
    'vfield' => 'title',
    'valcn' => array(
        '学习',
        '工作',
        '生活',
        '家庭',
        '个人',
        '临时',
    ),
    'valen' => array(
        'Study',
        'Work',
        'Life',
        'Family',
        'Personal',
        'Temporary',
    ),
    'where' => "model='info'",
);

$_dbtabs[] = array(
    'table' => 'base_catalog',
    'kfield' => 'kid',
    'keys' => array(
        'profile',
        'awhua',
        'aserv',
        'anews',
        'apics',
        'afqas',
        'alink',
        'aduty',
    ), 
    'vfield' => 'title',
    'valcn' => array(
        '公司简介',
        '企业文化',
        '服务内容',
        '公司新闻',
        '公司图片',
        '常见问题',
        '联系我们',
        '责权申明',
    ), 
    'valen' => array(
        'Profile',
        'Culture',
        'Service',
        'Corp-news',
        'Album',
        'Faqs',
        'Contact',
        'Declare',
    ), 
    'where' => "model='about'",
);

$_dbtabs[] = array(
    'table' => 'base_model',
    'kfield' => 'kid',
    'keys' => array(
        'info',
        'wall',
        'about',
        'irem',
    ),
    'vfield' => 'title',
    'valcn' => array(
        '博客文章',
        '便笺墙',
        '网站介绍',
        '博文评论',
    ),
    'valen' => array(
        'Articles',
        'Memo-Wall',
        'AboutMe',
        'BlogRemark',
    ),
    'where' => "pid IN('docs','coms')",
);

$_updmods = array('about','info');

// 综合结果 ------------------------
$_scfgs['demo_tabs'] = $_demo_tabs;
$_scfgs['files'] = $_files;
$_scfgs['dbtabs'] = $_dbtabs; 
$_scfgs['updmods'] = $_updmods; 

<?php
/*
 * 文档通用模板配置
/*/
$_vc_info = array(

    //config配置
    'c' => array(
        'vmode' => 'dynamic', //dynamic,static,close
        'stexp' => '2h', //hour(s)
    ),
    
    //mod.home模块首页
    'm' => array(
        '0' => 'info/mtype', //首页,news/mtype,info/mhome
        'list' => 'info/mtype', //搜索,news/mtype
    ), 
    
    //详情页
    'd' => array(
        '0' => 'info/detail',
        'rem' => 'info/remark', // detail-rem
        'pub' => 'info/publish', // detail-pub
    ),
    
    //评论
    #'remark' => 'info/remark',

    //类别页
    't' => 'info/mtype',

);

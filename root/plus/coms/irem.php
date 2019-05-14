<?php
namespace imcat;
$_mod = basename(__FILE__,'.php');
require __DIR__.'/_cfgcom.php'; 
 
$re2 = safComm::formCAll('rempub');
if(!empty($re2[0])){
    die(lang('plus.coms_errvcode'));
}

$dop->svPrep(); 
$dop->svAKey();
$dop->svPKey('add');
$db->table($dop->tbid)->data($dop->fmv)->insert(); 
die(lang('plus.coms_addok',$_groups[$mod]['title']));

//die();

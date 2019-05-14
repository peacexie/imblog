<?php
$_irem = array (
  'kid' => 'irem',
  'pid' => 'coms',
  'title' => '博客评论',
  'enable' => '1',
  'etab' => '0',
  'deep' => '1',
  'cfgs' => 'showdef=0
login=0
ap_cvip=500
allpub=100
ippub=5
iprep=60',
  'pmod' => 'info',
  'cradd' => '10',
  'f' => 
  array (
    'detail' => 
    array (
      'kid' => 'detail',
      'title' => '内容',
      'etab' => '0',
      'type' => 'text',
      'dbtype' => 'text',
      'dblen' => '0',
      'dbdef' => '',
      'vreg' => '',
      'vtip' => '内容10字符以上',
      'vmax' => '255',
      'fmsize' => '360x5',
      'fmline' => '1',
      'fmtitle' => '1',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => '',
    ),
    'mname' => 
    array (
      'kid' => 'mname',
      'title' => '昵称',
      'etab' => '0',
      'type' => 'input',
      'dbtype' => 'varchar',
      'dblen' => '24',
      'dbdef' => '',
      'vreg' => 'str:2-24',
      'vtip' => '2-24字符',
      'vmax' => '24',
      'fmsize' => '',
      'fmline' => '1',
      'fmtitle' => '1',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => '',
    ),
  ),
);
?>
<?php
$_wall = array (
  'kid' => 'wall',
  'pid' => 'coms',
  'title' => '便笺墙',
  'enable' => '1',
  'etab' => '0',
  'deep' => '1',
  'f' => 
  array (
    'title' => 
    array (
      'kid' => 'title',
      'title' => '文本内容',
      'etab' => '0',
      'type' => 'text',
      'dbtype' => 'text',
      'dblen' => '0',
      'dbdef' => '',
      'vreg' => 'str:3-240',
      'vtip' => '标题3-240字符',
      'vmax' => '240',
      'fmsize' => '360x12',
      'fmline' => '1',
      'fmtitle' => '1',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => '',
    ),
    'vtxt' => 
    array (
      'kid' => 'vtxt',
      'title' => '情景文字',
      'etab' => '0',
      'type' => 'select',
      'dbtype' => 'varchar',
      'dblen' => '12',
      'dbdef' => 'text-info',
      'vreg' => '',
      'vtip' => '',
      'vmax' => '12',
      'fmsize' => '',
      'fmline' => '1',
      'fmtitle' => '0',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => 'text-primary=text-primary
text-secondary=text-secondary
text-success=text-success
text-danger=text-danger
text-warning=text-warning
text-info=text-info
text-light=text-light
text-dark=text-dark
text-muted=text-muted
text-white=text-white',
    ),
    'vbg' => 
    array (
      'kid' => 'vbg',
      'title' => '情境背景',
      'etab' => '0',
      'type' => 'select',
      'dbtype' => 'varchar',
      'dblen' => '12',
      'dbdef' => 'bg-light',
      'vreg' => 'nul:str:2-12',
      'vtip' => '',
      'vmax' => '12',
      'fmsize' => '',
      'fmline' => '1',
      'fmtitle' => '0',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => 'bg-primary=bg-primary
bg-secondary=bg-secondary
bg-success=bg-success
bg-danger=bg-danger
bg-warning=bg-warning
bg-info=bg-info
bg-light=bg-light
bg-dark=bg-dark
bg-white=bg-white',
    ),
    'diggtop' => 
    array (
      'kid' => 'diggtop',
      'title' => 'diggtop',
      'etab' => '0',
      'type' => 'input',
      'dbtype' => 'int',
      'dblen' => '12',
      'dbdef' => '0',
      'vreg' => '',
      'vtip' => '',
      'vmax' => '12',
      'fmsize' => '90',
      'fmline' => '1',
      'fmtitle' => '0',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => '',
    ),
    'diggdown' => 
    array (
      'kid' => 'diggdown',
      'title' => 'diggdown',
      'etab' => '0',
      'type' => 'input',
      'dbtype' => 'int',
      'dblen' => '12',
      'dbdef' => '0',
      'vreg' => '',
      'vtip' => '',
      'vmax' => '12',
      'fmsize' => '90',
      'fmline' => '0',
      'fmtitle' => '1',
      'fmextra' => '',
      'fmexstr' => '',
      'cfgs' => '',
    ),
  ),
);
?>
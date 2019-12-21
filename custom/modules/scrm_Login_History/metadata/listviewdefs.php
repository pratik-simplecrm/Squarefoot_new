<?php
$module_name = 'scrm_Login_History';
$listViewDefs [$module_name] = 
array (
  'LOGIN_TIME_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_LOGIN_TIME',
    'width' => '10%',
  ),
  'LOGOFF_TIME_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_LOGOFF_TIME',
    'width' => '10%',
  ),
  'TOTAL_LOGIN_TIME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TOTAL_LOGIN_TIME',
    'width' => '10%',
  ),
  'IP_ADDRESS_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_IP_ADDRESS',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
);
?>

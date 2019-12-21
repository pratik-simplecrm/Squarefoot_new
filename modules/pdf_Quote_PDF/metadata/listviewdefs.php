<?php
$module_name = 'pdf_Quote_PDF';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'BRANCH' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_BRANCH',
    'width' => '10%',
    'default' => true,
  ),
  'W' => 
  array (
    'type' => 'date',
    'label' => 'LBL_W',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>

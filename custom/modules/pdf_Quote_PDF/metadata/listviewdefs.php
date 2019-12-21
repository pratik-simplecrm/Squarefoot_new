<?php
$module_name = 'pdf_Quote_PDF';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
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
  'VAT_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VAT_NO',
    'width' => '10%',
    'default' => true,
  ),
  'CST_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CST_NO',
    'width' => '10%',
    'default' => true,
  ),
  'STN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STN',
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
  'PF_NO_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ PF_NO',
    'width' => '10%',
  ),
  'ESIC_NO_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ESIC_NO',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>

<?php
$module_name = 'EvMgr_Pgms';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PROGRAM_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROGRAM_TYPE',
    'width' => '10%',
  ),
  'NUM_MODULES' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_MODULES',
    'width' => '10%',
    'default' => true,
  ),
  'IN_COURSE_TIME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IN_COURSE_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'ELAPSED_TIME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ELAPSED_TIME',
    'width' => '15%',
    'default' => true,
  ),
  'CATEGORY_SELF' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_SELF',
    'width' => '10%',
  ),
  'CATEGORY_OTHERS' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_OTHERS',
    'width' => '10%',
  ),
  'CATEGORY_COMPANY' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_COMPANY',
    'width' => '10%',
  ),
);
?>

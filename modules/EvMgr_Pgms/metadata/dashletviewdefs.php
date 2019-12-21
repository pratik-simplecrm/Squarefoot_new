<?php
$dashletData['EvMgr_PgmsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'program_type' => 
  array (
    'default' => '',
  ),
  'num_modules' => 
  array (
    'default' => '',
  ),
  'in_course_time' => 
  array (
    'default' => '',
  ),
  'elapsed_time' => 
  array (
    'default' => '',
  ),
  'category_self' => 
  array (
    'default' => '',
  ),
  'category_others' => 
  array (
    'default' => '',
  ),
  'category_company' => 
  array (
    'default' => '',
  ),
);
$dashletData['EvMgr_PgmsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'program_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROGRAM_TYPE',
    'width' => '10%',
    'name' => 'program_type',
  ),
  'num_modules' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_MODULES',
    'width' => '10%',
    'default' => true,
    'name' => 'num_modules',
  ),
  'in_course_time' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IN_COURSE_TIME',
    'width' => '10%',
    'default' => true,
    'name' => 'in_course_time',
  ),
  'elapsed_time' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ELAPSED_TIME',
    'width' => '15%',
    'default' => true,
    'name' => 'elapsed_time',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'category_company' => 
  array (
    'type' => 'radioenum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_COMPANY',
    'width' => '10%',
    'name' => 'category_company',
  ),
  'category_others' => 
  array (
    'type' => 'radioenum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_OTHERS',
    'width' => '10%',
    'name' => 'category_others',
  ),
  'category_self' => 
  array (
    'type' => 'radioenum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_SELF',
    'width' => '10%',
    'name' => 'category_self',
  ),
);

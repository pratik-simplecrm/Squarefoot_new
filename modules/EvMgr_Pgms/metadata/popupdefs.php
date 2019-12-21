<?php
$popupMeta = array (
    'moduleMain' => 'EvMgr_Pgms',
    'varName' => 'EvMgr_Pgms',
    'orderBy' => 'evmgr_pgms.name',
    'whereClauses' => array (
  'name' => 'evmgr_pgms.name',
  'program_type' => 'evmgr_pgms.program_type',
  'num_modules' => 'evmgr_pgms.num_modules',
  'in_course_time' => 'evmgr_pgms.in_course_time',
  'elapsed_time' => 'evmgr_pgms.elapsed_time',
  'category_self' => 'evmgr_pgms.category_self',
  'category_others' => 'evmgr_pgms.category_others',
  'category_company' => 'evmgr_pgms.category_company',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'program_type',
  5 => 'num_modules',
  6 => 'in_course_time',
  7 => 'elapsed_time',
  8 => 'category_self',
  9 => 'category_others',
  10 => 'category_company',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'program_type' => 
  array (
    'type' => 'enum',
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
    'name' => 'num_modules',
  ),
  'in_course_time' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IN_COURSE_TIME',
    'width' => '10%',
    'name' => 'in_course_time',
  ),
  'elapsed_time' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ELAPSED_TIME',
    'width' => '10%',
    'name' => 'elapsed_time',
  ),
  'category_self' => 
  array (
    'type' => 'radioenum',
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_SELF',
    'width' => '10%',
    'name' => 'category_self',
  ),
  'category_others' => 
  array (
    'type' => 'radioenum',
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_OTHERS',
    'width' => '10%',
    'name' => 'category_others',
  ),
  'category_company' => 
  array (
    'type' => 'radioenum',
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY_COMPANY',
    'width' => '10%',
    'name' => 'category_company',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '25%',
    'default' => true,
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
),
);

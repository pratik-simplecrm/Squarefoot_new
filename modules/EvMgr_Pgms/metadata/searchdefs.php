<?php
$module_name = 'EvMgr_Pgms';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
        'width' => '10%',
        'default' => true,
        'name' => 'elapsed_time',
      ),
      'category_self' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_SELF',
        'width' => '10%',
        'name' => 'category_self',
      ),
      'category_others' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_OTHERS',
        'width' => '10%',
        'name' => 'category_others',
      ),
      'category_company' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_COMPANY',
        'width' => '10%',
        'name' => 'category_company',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'course_or_program' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_COURSE_OR_PROGRAM',
        'width' => '10%',
        'name' => 'course_or_program',
      ),
      'num_modules' => 
      array (
        'type' => 'int',
        'label' => 'LBL_NUM_MODULES',
        'width' => '10%',
        'default' => true,
        'name' => 'num_modules',
      ),
      'avg_hours_per_module' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_AVG_HOURS_PER_MODULE',
        'width' => '10%',
        'default' => true,
        'name' => 'avg_hours_per_module',
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
        'width' => '10%',
        'default' => true,
        'name' => 'elapsed_time',
      ),
      'category_self' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_SELF',
        'width' => '10%',
        'name' => 'category_self',
      ),
      'category_others' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_OTHERS',
        'width' => '10%',
        'name' => 'category_others',
      ),
      'category_company' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CATEGORY_COMPANY',
        'width' => '10%',
        'name' => 'category_company',
      ),
      'for_supervisor' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_FOR_SUPERVISOR',
        'width' => '10%',
        'name' => 'for_supervisor',
      ),
      'for_middle_manager' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_FOR_MIDDLE_MANAGER',
        'width' => '10%',
        'name' => 'for_middle_manager',
      ),
      'for_executive' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_FOR_EXECUTIVE',
        'width' => '10%',
        'name' => 'for_executive',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'self_interests' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_INTERESTS',
        'width' => '10%',
        'name' => 'self_interests',
      ),
      'self_strengths' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_STRENGTHS',
        'width' => '10%',
        'name' => 'self_strengths',
      ),
      'self_cruc_conv' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_CRUC_CONV',
        'width' => '10%',
        'name' => 'self_cruc_conv',
      ),
      'self_presn' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_PRESN',
        'width' => '10%',
        'name' => 'self_presn',
      ),
      'oth_carerr_dev' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_CARERR_DEV',
        'width' => '10%',
        'name' => 'oth_carerr_dev',
      ),
      'self_oa' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_OA',
        'width' => '10%',
        'name' => 'self_oa',
      ),
      'oth_pers_profile' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_PERS_PROFILE',
        'width' => '10%',
        'name' => 'oth_pers_profile',
      ),
      'oth_build_teams' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_BUILD_TEAMS',
        'width' => '10%',
        'name' => 'oth_build_teams',
      ),
      'oth_results' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_RESULTS',
        'width' => '10%',
        'name' => 'oth_results',
      ),
      'oth_mng_sys_proc' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_MNG_SYS_PROC',
        'width' => '10%',
        'name' => 'oth_mng_sys_proc',
      ),
      'oth_mng_sales' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTH_MNG_SALES',
        'width' => '10%',
        'name' => 'oth_mng_sales',
      ),
      'co_change' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CO_CHANGE',
        'width' => '10%',
        'name' => 'co_change',
      ),
      'co_vision' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CO_VISION',
        'width' => '10%',
        'name' => 'co_vision',
      ),
      'co_risk' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CO_RISK',
        'width' => '10%',
        'name' => 'co_risk',
      ),
      'self_ei' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SELF_EI',
        'width' => '10%',
        'name' => 'self_ei',
      ),
      'co_succession' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CO_SUCCESSION',
        'width' => '10%',
        'name' => 'co_succession',
      ),
      'co_board' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CO_BOARD',
        'width' => '10%',
        'name' => 'co_board',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>

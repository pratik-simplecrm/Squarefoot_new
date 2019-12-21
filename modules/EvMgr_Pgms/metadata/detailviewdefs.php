<?php
$module_name = 'EvMgr_Pgms';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '3',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '11',
          'field' => '22',
        ),
        1 => 
        array (
          'label' => '11',
          'field' => '22',
        ),
        2 => 
        array (
          'label' => '11',
          'field' => '22',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'evmgr_pgms_accounts_name',
            'label' => 'LBL_EVMGR_PGMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
          2 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'program_type',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAM_TYPE',
          ),
          1 => 
          array (
            'name' => 'course_or_program',
            'studio' => 'visible',
            'label' => 'LBL_COURSE_OR_PROGRAM',
          ),
          2 => 
          array (
            'name' => 'elapsed_time',
            'label' => 'LBL_ELAPSED_TIME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'for_supervisor',
            'label' => 'LBL_FOR_SUPERVISOR',
          ),
          1 => 
          array (
            'name' => 'for_middle_manager',
            'label' => 'LBL_FOR_MIDDLE_MANAGER',
          ),
          2 => 
          array (
            'name' => 'for_executive',
            'label' => 'LBL_FOR_EXECUTIVE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'num_modules',
            'label' => 'LBL_NUM_MODULES',
          ),
          1 => 
          array (
            'name' => 'avg_hours_per_module',
            'label' => 'LBL_AVG_HOURS_PER_MODULE',
          ),
          2 => 
          array (
            'name' => 'in_course_time',
            'label' => 'LBL_IN_COURSE_TIME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'fac_fees',
            'label' => 'LBL_FAC_FEES',
          ),
          1 => 
          array (
            'name' => 'material_fees',
            'label' => 'LBL_MATERIAL_FEES',
          ),
          2 => 
          array (
            'name' => 'other_fees',
            'label' => 'LBL_OTHER_FEES',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'category_self',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_SELF',
          ),
          1 => 
          array (
            'name' => 'category_others',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_OTHERS',
          ),
          2 => 
          array (
            'name' => 'category_company',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_COMPANY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'self_interests',
            'label' => 'LBL_SELF_INTERESTS',
          ),
          1 => 
          array (
            'name' => 'oth_carerr_dev',
            'label' => 'LBL_OTH_CARERR_DEV',
          ),
          2 => 
          array (
            'name' => 'co_change',
            'label' => 'LBL_CO_CHANGE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'self_strengths',
            'label' => 'LBL_SELF_STRENGTHS',
          ),
          1 => 
          array (
            'name' => 'oth_pers_profile',
            'label' => 'LBL_OTH_PERS_PROFILE',
          ),
          2 => 
          array (
            'name' => 'co_vision',
            'label' => 'LBL_CO_VISION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'self_ei',
            'label' => 'LBL_SELF_EI',
          ),
          1 => 
          array (
            'name' => 'oth_build_teams',
            'label' => 'LBL_OTH_BUILD_TEAMS',
          ),
          2 => 
          array (
            'name' => 'co_risk',
            'label' => 'LBL_CO_RISK',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'self_oa',
            'label' => 'LBL_SELF_OA',
          ),
          1 => 
          array (
            'name' => 'oth_results',
            'label' => 'LBL_OTH_RESULTS',
          ),
          2 => 
          array (
            'name' => 'co_succession',
            'label' => 'LBL_CO_SUCCESSION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'self_cruc_conv',
            'label' => 'LBL_SELF_CRUC_CONV',
          ),
          1 => 
          array (
            'name' => 'oth_mng_sales',
            'label' => 'LBL_OTH_MNG_SALES',
          ),
          2 => 
          array (
            'name' => 'co_board',
            'label' => 'LBL_CO_BOARD',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'self_presn',
            'label' => 'LBL_SELF_PRESN',
          ),
          1 => 
          array (
            'name' => 'oth_mng_sys_proc',
            'label' => 'LBL_OTH_MNG_SYS_PROC',
          ),
          2 => '',
        ),
      ),
    ),
  ),
);
?>

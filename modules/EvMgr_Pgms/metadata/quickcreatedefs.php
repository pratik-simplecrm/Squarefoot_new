<?php
$module_name = 'EvMgr_Pgms';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
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
            'name' => 'category_self',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_SELF',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'num_modules',
            'label' => 'LBL_NUM_MODULES',
          ),
          1 => 
          array (
            'name' => 'category_others',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_OTHERS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'elapsed_time',
            'label' => 'LBL_ELAPSED_TIME',
          ),
          1 => 
          array (
            'name' => 'category_company',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY_COMPANY',
          ),
        ),
      ),
    ),
  ),
);
?>

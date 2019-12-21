<?php
$module_name = 'scrm_Login_History';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'login_time_c',
            'label' => 'LBL_LOGIN_TIME',
          ),
          1 => 
          array (
            'name' => 'logoff_time_c',
            'label' => 'LBL_LOGOFF_TIME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'scrm_login_audit_scrm_login_history_1_name',
          ),
          1 => 
          array (
            'name' => 'total_login_time_c',
            'label' => 'LBL_TOTAL_LOGIN_TIME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ip_address_c',
            'label' => 'LBL_IP_ADDRESS',
          ),
          1 => 'name',
        ),
      ),
    ),
  ),
);
?>

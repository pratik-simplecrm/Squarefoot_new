<?php
$module_name = 'EvMgr_VenRms';
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
            'name' => 'evmgr_venrms_accounts_name',
            'label' => 'LBL_EVMGR_VENRMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
	     'displayParams' => array(
		'initial_filter' => '&account_type=Venue',
	     ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'room_type',
            'studio' => 'visible',
            'label' => 'LBL_ROOM_TYPE',
          ),
          1 => 
          array (
            'name' => 'square_feet',
            'label' => 'LBL_SQUARE_FEET',
          ),
        ),
      ),
    ),
  ),
);
?>

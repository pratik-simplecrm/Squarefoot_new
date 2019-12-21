<?php
$module_name = 'EvMgr_VenRms';
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
            'name' => 'evmgr_venrms_accounts_name',
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
            'name' => 'room_shape',
            'label' => 'LBL_ROOM_SHAPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'room_rating',
            'studio' => 'visible',
            'label' => 'LBL_ROOM_RATING',
          ),
          1 => 
          array (
            'name' => 'square_feet',
            'label' => 'LBL_SQUARE_FEET',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'private',
            'label' => 'LBL_PRIVATE',
          ),
          1 => 
          array (
            'name' => 'length',
            'label' => 'LBL_LENGTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'flex_layout',
            'label' => 'LBL_FLEX_LAYOUT',
          ),
          1 => 
          array (
            'name' => 'width',
            'label' => 'LBL_WIDTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'washrooms',
            'label' => 'LBL_WASHROOMS',
          ),
          1 => 
          array (
            'name' => 'room_phone',
            'label' => 'LBL_ROOM_PHONE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'podium',
            'label' => 'LBL_PODIUM',
          ),
          1 => 
          array (
            'name' => 'windows',
            'label' => 'LBL_WINDOWS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'wheelchair',
            'label' => 'LBL_WHEELCHAIR',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'room_fees',
            'label' => 'LBL_ROOM_FEES',
          ),
        ),
        9 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'room_restrictions',
            'studio' => 'visible',
            'label' => 'LBL_ROOM_RESTRICTIONS',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cap_standup',
            'label' => 'LBL_CAP_STANDUP',
          ),
          1 => 
          array (
            'name' => 'cap_round_5',
            'label' => 'LBL_CAP_ROUND_5',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'cap_theatre',
            'label' => 'LBL_CAP_THEATRE',
          ),
          1 => 
          array (
            'name' => 'cap_round_8',
            'label' => 'LBL_CAP_ROUND_8',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cap_u_shape',
            'label' => 'LBL_CAP_U_SHAPE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>

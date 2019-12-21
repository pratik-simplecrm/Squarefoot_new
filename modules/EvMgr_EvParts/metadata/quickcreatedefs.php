<?php
$module_name = 'EvMgr_EvParts';
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
          0 => 
          array (
            'name' => 'evmgr_evparts_evmgr_evs_name',
            'label' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVS_TITLE',
          ),
          1 => 
          array (
            'name' => 'evmgr_evparts_contacts_name',
            'label' => 'LBL_EVMGR_EVPARTS_CONTACTS_FROM_CONTACTS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'attendee_status',
            'studio' => 'visible',
            'label' => 'LBL_ATTENDEE_STATUS',
          ),
          1 => 
          array (
            'name' => 'event_ce_hours',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_CE_HOURS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>

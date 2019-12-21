<?php
$module_name = 'EvMgr_EvParts';
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
          0 => 'description',
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>

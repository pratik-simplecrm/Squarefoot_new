<?php
$module_name = 'EvMgr_Evs';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
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
            'name' => 'evmgr_evs_opportunities_name',
            'label' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_status',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_STATUS',
          ),
          1 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'pre_material_required',
            'label' => 'LBL_PRE_MATERIAL_REQUIRED',
          ),
          1 => 
          array (
            'name' => 'ce_hours_credit',
            'label' => 'LBL_CE_HOURS_CREDIT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'accomodations_required',
            'label' => 'LBL_ACCOMODATIONS_REQUIRED',
          ),
          1 => 'assigned_user_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fire_alarm_schedule_checked',
            'label' => 'LBL_FIRE_ALARM_SCHEDULE_CHECKED',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>

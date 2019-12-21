<?php
$module_name = 'EvMgr_Evs';
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
      'start_date' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'start_date',
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
      'event_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_TYPE',
        'width' => '10%',
        'name' => 'event_type',
      ),
      'start_date' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'start_date',
      ),
      'end_date' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
      ),
      'event_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_STATUS',
        'width' => '10%',
        'name' => 'event_status',
      ),
      'ce_hours_credit' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_CE_HOURS_CREDIT',
        'width' => '10%',
        'name' => 'ce_hours_credit',
      ),
      'assigned_user_name' => 
      array (
        'link' => true,
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'id' => 'ASSIGNED_USER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
      'post_event_commentary' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_POST_EVENT_COMMENTARY',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'post_event_commentary',
      ),
      'evmgr_evs_opportunities_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
        'id' => 'EVMGR_EVS_OPPORTUNITIESOPPORTUNITIES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'evmgr_evs_opportunities_name',
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

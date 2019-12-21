<?php
$module_name = 'EvMgr_EvParts';
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
      'event_start_date_imported' => 
      array (
        'type' => 'datetime',
        'studio' => 'visible',
        'label' => 'LBL_EVENT_START_DATE_IMPORTED',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_date_imported',
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
      'attendee_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ATTENDEE_STATUS',
        'width' => '10%',
        'name' => 'attendee_status',
      ),
      'event_ce_hours' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_CE_HOURS',
        'width' => '10%',
        'name' => 'event_ce_hours',
      ),
      'event_start_date_imported' => 
      array (
        'type' => 'datetime',
        'studio' => 'visible',
        'label' => 'LBL_EVENT_START_DATE_IMPORTED',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_date_imported',
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

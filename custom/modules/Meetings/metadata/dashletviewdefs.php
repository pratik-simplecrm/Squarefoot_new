<?php
$dashletData['MeetingsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'status' => 
  array (
    'default' => '',
  ),
  'date_start' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'accountname_c' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['MeetingsDashlet']['columns'] = array (
  'set_complete' => 
  array (
    'width' => '1',
    'label' => 'LBL_LIST_CLOSE',
    'default' => true,
    'sortable' => false,
    'related_fields' => 
    array (
      0 => 'status',
      1 => 'recurring_source',
    ),
  ),
  'name' => 
  array (
    'width' => '40',
    'label' => 'LBL_SUBJECT',
    'link' => true,
    'default' => true,
  ),
  'parent_name' => 
  array (
    'width' => '29',
    'label' => 'LBL_LIST_RELATED_TO',
    'sortable' => false,
    'dynamic_module' => 'PARENT_TYPE',
    'link' => true,
    'id' => 'PARENT_ID',
    'ACLTag' => 'PARENT',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
    'default' => true,
  ),
  'duration' => 
  array (
    'width' => '15',
    'label' => 'LBL_DURATION',
    'sortable' => false,
    'related_fields' => 
    array (
      0 => 'duration_hours',
      1 => 'duration_minutes',
    ),
  ),
  'date_start' => 
  array (
    'width' => '15',
    'label' => 'LBL_DATE',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'time_start',
    ),
  ),
  'set_accept_links' => 
  array (
    'width' => '10',
    'label' => 'LBL_ACCEPT_THIS',
    'sortable' => false,
    'default' => true,
    'related_fields' => 
    array (
      0 => 'status',
    ),
  ),
  'status' => 
  array (
    'width' => '8',
    'label' => 'LBL_STATUS',
  ),
  'date_entered' => 
  array (
    'width' => '15',
    'label' => 'LBL_DATE_ENTERED',
  ),
  'date_modified' => 
  array (
    'width' => '15',
    'label' => 'LBL_DATE_MODIFIED',
  ),
  'created_by' => 
  array (
    'width' => '8',
    'label' => 'LBL_CREATED',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8',
    'label' => 'LBL_LIST_ASSIGNED_USER',
  ),
);

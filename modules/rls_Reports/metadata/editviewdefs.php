<?php
// created: 2016-08-09 21:52:13
$viewdefs['rls_Reports']['EditView'] = array (
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
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'modules/rls_Reports/js/EditView.js',
      ),
    ),
    'useTabs' => true,
    'tabDefs' => 
    array (
      'LBL_WIZARD' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
      'LBL_CHART_OPTIONS' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
      'LBL_DETAILS' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'lbl_wizard' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'wizard',
          'hideLabel' => true,
        ),
      ),
    ),
    'lbl_chart_options' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'chart_type',
          'label' => 'LBL_CHART_TYPE',
        ),
      ),
    ),
    'lbl_details' => 
    array (
      0 => 
      array (
        0 => 'name',
        1 => 'assigned_user_name',
      ),
      1 => 
      array (
        0 => 'description',
      ),
    ),
  ),
);
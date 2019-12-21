<?php
$module_name = 'simpl_Feed_Back_Form';
$listViewDefs [$module_name] = 
array (
  'DATE_ENTERED_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DATE_ENTERED_C',
    'link' => true,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
  ),
);
?>

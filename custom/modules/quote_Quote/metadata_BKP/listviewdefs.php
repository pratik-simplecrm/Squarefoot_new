<?php
$module_name = 'quote_Quote';
$OBJECT_NAME = 'QUOTE_QUOTE';
$listViewDefs [$module_name] = 
array (
  'CUSTOM_QUOTE_NUM_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CUSTOM_QUOTE_NUM_C',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_SUBJECT',
    'default' => true,
    'link' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'QUOTE_QUOTE_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'QUOTE_QUOTE_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'QUOTATION_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_QUOTATION_STATUS',
    'width' => '10%',
  ),
  'GRAND_TOTAL' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_GRAND_TOTAL',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'VALID_UNTIL_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_VALID_UNTIL',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'TEAM_NAME' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TEAM_NAME',
    'id' => 'TEAM_ID',
    'link' => true,
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'RESOLUTION' => 
  array (
    'width' => '10%',
    'label' => 'LBL_RESOLUTION',
    'default' => false,
  ),
  'PRIORITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIORITY',
    'default' => false,
  ),
);
?>
<?php
/*
   This limits the ListView based on teams - part of the CE Teams module
   It is a template which is added to the end of modules/<module>/metadata/listviewdefs.php
   by the custom logic whenever it is needed
   This is needed because there is no logic hook that can modify the listview query
*/
require_once "modules/team/teams_logic.php";
$tmp = new teams_logic();
$tmp->limit_list_access($this, 'before_listview');
?>

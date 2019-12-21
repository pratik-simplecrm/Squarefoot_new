<?php
$popupMeta = array (
    'moduleMain' => 'scrm_Accounts',
    'varName' => 'scrm_Accounts',
    'orderBy' => 'scrm_accounts.first_name, scrm_accounts.last_name',
    'whereClauses' => array (
  'first_name' => 'scrm_accounts.first_name',
  'last_name' => 'scrm_accounts.last_name',
  'address_city' => 'scrm_accounts.address_city',
  'created_by_name' => 'scrm_accounts.created_by_name',
  'do_not_call' => 'scrm_accounts.do_not_call',
  'email' => 'scrm_accounts.email',
  'branch_c' => 'scrm_accounts_cstm.branch_c',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'address_city',
  3 => 'created_by_name',
  4 => 'do_not_call',
  5 => 'email',
  6 => 'branch_c',
),
    'searchdefs' => array (
  'first_name' => 
  array (
    'name' => 'first_name',
    'width' => '10%',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'address_city' => 
  array (
    'name' => 'address_city',
    'width' => '10%',
  ),
  'created_by_name' => 
  array (
    'name' => 'created_by_name',
    'width' => '10%',
  ),
  'do_not_call' => 
  array (
    'name' => 'do_not_call',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'branch_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_BRANCH',
    'width' => '10%',
    'name' => 'branch_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'link' => true,
    'orderBy' => 'last_name',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'FIRST_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'first_name',
  ),
  'LAST_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'last_name',
  ),
  'TITLE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TITLE',
    'default' => true,
    'name' => 'title',
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
    'name' => 'email1',
  ),
  'BRANCH_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BRANCH',
    'width' => '10%',
  ),
),
);

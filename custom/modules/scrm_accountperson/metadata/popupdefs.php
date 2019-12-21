<?php
$popupMeta = array (
    'moduleMain' => 'scrm_accountperson',
    'varName' => 'scrm_accountperson',
    'orderBy' => 'scrm_accountperson.first_name, scrm_accountperson.last_name',
    'whereClauses' => array (
  'first_name' => 'scrm_accountperson.first_name',
  'last_name' => 'scrm_accountperson.last_name',
  'address_city' => 'scrm_accountperson.address_city',
  'created_by_name' => 'scrm_accountperson.created_by_name',
  'do_not_call' => 'scrm_accountperson.do_not_call',
  'email' => 'scrm_accountperson.email',
  'branch' => 'scrm_accountperson.branch',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'address_city',
  3 => 'created_by_name',
  4 => 'do_not_call',
  5 => 'email',
  6 => 'branch',
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
  'branch' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_BRANCH',
    'width' => '10%',
    'name' => 'branch',
  ),
),
);

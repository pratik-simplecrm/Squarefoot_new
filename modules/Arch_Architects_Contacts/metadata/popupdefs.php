<?php
$popupMeta = array (
    'moduleMain' => 'Arch_Architects_Contacts',
    'varName' => 'Arch_Architects_Contacts',
    'orderBy' => 'arch_architects_contacts.first_name, arch_architects_contacts.last_name',
    'whereClauses' => array (
  'first_name' => 'arch_architects_contacts.first_name',
  'last_name' => 'arch_architects_contacts.last_name',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'ARCHI_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ARCHI_TYPE',
    'width' => '10%',
    'default' => true,
  ),
),
);

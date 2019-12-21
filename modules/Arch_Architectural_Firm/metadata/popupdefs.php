<?php
$popupMeta = array (
    'moduleMain' => 'Arch_Architectural_Firm',
    'varName' => 'Arch_Architectural_Firm',
    'orderBy' => 'arch_architectural_firm.name',
    'whereClauses' => array (
  'name' => 'arch_architectural_firm.name',
  'billing_address_city' => 'arch_architectural_firm.billing_address_city',
  'phone_office' => 'arch_architectural_firm.phone_office',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'billing_address_city',
  2 => 'phone_office',
  3 => 'industry',
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'ARCHI' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ARCHI',
    'width' => '10%',
    'default' => true,
  ),
),
);

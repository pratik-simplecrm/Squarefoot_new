<?php
$popupMeta = array (
    'moduleMain' => 'Arch_Architects_Contacts',
    'varName' => 'Arch_Architects_Contacts',
    'orderBy' => 'arch_architects_contacts.first_name, arch_architects_contacts.last_name',
    'whereClauses' => array (
  'name' => 'arch_architects_contacts.name',
  'date_entered' => 'arch_architects_contacts.date_entered',
  'date_modified' => 'arch_architects_contacts.date_modified',
  'arch_architectural_firm_arch_architects_contacts_1_name' => 'arch_architects_contacts.arch_architectural_firm_arch_architects_contacts_1_name',
  'department' => 'arch_architects_contacts.department',
  'primary_address_city' => 'arch_architects_contacts.primary_address_city',
  'assigned_user_name' => 'arch_architects_contacts.assigned_user_name',
  'email' => 'arch_architects_contacts.email',
  'archi_type' => 'arch_architects_contacts.archi_type',
  'educational_institutional' => 'arch_architects_contacts.educational_institutional',
  'hospital' => 'arch_architects_contacts.hospital',
  'hotels' => 'arch_architects_contacts.hotels',
  'pharmaceutical' => 'arch_architects_contacts.pharmaceutical',
  'residential' => 'arch_architects_contacts.residential',
  'retail' => 'arch_architects_contacts.retail',
  'sports' => 'arch_architects_contacts.sports',
  'others' => 'arch_architects_contacts.others',
),
    'searchInputs' => array (
  2 => 'name',
  3 => 'date_entered',
  4 => 'date_modified',
  5 => 'arch_architectural_firm_arch_architects_contacts_1_name',
  6 => 'department',
  7 => 'primary_address_city',
  8 => 'assigned_user_name',
  9 => 'email',
  10 => 'archi_type',
  11 => 'educational_institutional',
  12 => 'hospital',
  13 => 'hotels',
  14 => 'pharmaceutical',
  15 => 'residential',
  16 => 'retail',
  17 => 'sports',
  18 => 'others',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'name' => 'date_modified',
  ),
  'arch_architectural_firm_arch_architects_contacts_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
    'id' => 'ARCH_ARCHIEAACAL_FIRM_IDA',
    'width' => '10%',
    'name' => 'arch_architectural_firm_arch_architects_contacts_1_name',
  ),
  'department' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DEPARTMENT',
    'width' => '10%',
    'name' => 'department',
  ),
  'primary_address_city' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'width' => '10%',
    'name' => 'primary_address_city',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
  'archi_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ARCHI_TYPE',
    'width' => '10%',
    'name' => 'archi_type',
  ),
  'educational_institutional' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_EDUCATIONAL_INSTITUTIONAL',
    'width' => '10%',
    'name' => 'educational_institutional',
  ),
  'hospital' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_HOSPITAL',
    'width' => '10%',
    'name' => 'hospital',
  ),
  'hotels' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_HOTELS',
    'width' => '10%',
    'name' => 'hotels',
  ),
  'pharmaceutical' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_PHARMACEUTICAL',
    'width' => '10%',
    'name' => 'pharmaceutical',
  ),
  'residential' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_RESIDENTIAL',
    'width' => '10%',
    'name' => 'residential',
  ),
  'retail' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_RETAIL',
    'width' => '10%',
    'name' => 'retail',
  ),
  'sports' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_SPORTS',
    'width' => '10%',
    'name' => 'sports',
  ),
  'others' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_OTHERS',
    'width' => '10%',
    'name' => 'others',
  ),
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

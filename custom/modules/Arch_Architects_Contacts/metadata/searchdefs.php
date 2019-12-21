<?php
$module_name = 'Arch_Architects_Contacts';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 
      array (
        'name' => 'search_name',
        'label' => 'LBL_NAME',
        'type' => 'name',
      ),
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'department' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DEPARTMENT',
        'width' => '10%',
        'default' => true,
        'name' => 'department',
      ),
      'primary_address_city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRIMARY_ADDRESS_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'primary_address_city',
      ),
      'assigned_user_name' => 
      array (
        'link' => true,
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'id' => 'ASSIGNED_USER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
      'primary_address_state' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRIMARY_ADDRESS_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'primary_address_state',
      ),
      'email' => 
      array (
        'name' => 'email',
        'default' => true,
        'width' => '10%',
      ),
      'archi_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_ARCHI_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'archi_type',
      ),
      'educational_institutional' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EDUCATIONAL_INSTITUTIONAL',
        'width' => '10%',
        'name' => 'educational_institutional',
      ),
      'hospital' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOSPITAL',
        'width' => '10%',
        'name' => 'hospital',
      ),
      'hotels' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOTELS',
        'width' => '10%',
        'name' => 'hotels',
      ),
      'pharmaceutical' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PHARMACEUTICAL',
        'width' => '10%',
        'name' => 'pharmaceutical',
      ),
      'residential' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_RESIDENTIAL',
        'width' => '10%',
        'name' => 'residential',
      ),
      'retail' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_RETAIL',
        'width' => '10%',
        'name' => 'retail',
      ),
      'sports' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SPORTS',
        'width' => '10%',
        'name' => 'sports',
      ),
      'others' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTHERS',
        'width' => '10%',
        'name' => 'others',
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

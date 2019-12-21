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
      'first_name' => 
      array (
        'name' => 'first_name',
        'default' => true,
        'width' => '10%',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'address_city' => 
      array (
        'name' => 'address_city',
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
      'hotels' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOTELS',
        'width' => '10%',
        'name' => 'hotels',
      ),
      'others' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTHERS',
        'width' => '10%',
        'name' => 'others',
      ),
      'hospital' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOSPITAL',
        'width' => '10%',
        'name' => 'hospital',
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
      'created_by_name' => 
      array (
        'name' => 'created_by_name',
        'default' => true,
        'width' => '10%',
      ),
      'email' => 
      array (
        'name' => 'email',
        'default' => true,
        'width' => '10%',
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

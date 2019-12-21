<?php
$module_name = 'Arch_Architectural_Firm';
$_module_name = 'arch_architectural_firm';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'archi' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_ARCHI',
        'width' => '10%',
        'default' => true,
        'name' => 'archi',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'address_street' => 
      array (
        'name' => 'address_street',
        'label' => 'LBL_ANY_ADDRESS',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'phone' => 
      array (
        'name' => 'phone',
        'label' => 'LBL_ANY_PHONE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'website' => 
      array (
        'name' => 'website',
        'default' => true,
        'width' => '10%',
      ),
      'address_city' => 
      array (
        'name' => 'address_city',
        'label' => 'LBL_CITY',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'address_state' => 
      array (
        'name' => 'address_state',
        'label' => 'LBL_STATE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'address_postalcode' => 
      array (
        'name' => 'address_postalcode',
        'label' => 'LBL_POSTAL_CODE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'address_country' => 
      array (
        'name' => 'address_country',
        'label' => 'LBL_COUNTRY',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'archi' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_ARCHI',
        'width' => '10%',
        'default' => true,
        'name' => 'archi',
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
      'pharmaceutical' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PHARMACEUTICAL',
        'width' => '10%',
        'name' => 'pharmaceutical',
      ),
      'hotels' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOTELS',
        'width' => '10%',
        'name' => 'hotels',
      ),
      'sports' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_SPORTS',
        'width' => '10%',
        'name' => 'sports',
      ),
      'educational_institution' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EDUCATIONAL_INSTITUTION',
        'width' => '10%',
        'name' => 'educational_institution',
      ),
      'others' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_OTHERS',
        'width' => '10%',
        'name' => 'others',
      ),
      'residential' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_RESIDENTIAL',
        'width' => '10%',
        'name' => 'residential',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'ownership' => 
      array (
        'name' => 'ownership',
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

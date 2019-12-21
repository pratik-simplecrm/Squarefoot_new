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
      'website' => 
      array (
        'name' => 'website',
        'default' => true,
        'width' => '10%',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
      'address_city' => 
      array (
        'name' => 'address_city',
        'label' => 'LBL_CITY',
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
      'pharmaceutical' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PHARMACEUTICAL',
        'width' => '10%',
        'name' => 'pharmaceutical',
      ),
      'educational_institution' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EDUCATIONAL_INSTITUTION',
        'width' => '10%',
        'name' => 'educational_institution',
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
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
        'name' => 'current_user_only',
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

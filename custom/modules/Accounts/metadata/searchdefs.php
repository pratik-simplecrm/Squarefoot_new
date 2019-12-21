<?php
$searchdefs ['Accounts'] = 
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'width' => '10%',
        'default' => true,
      ),
    ),
    'advanced_search' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      1 => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      2 => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      3 => 
      array (
        'name' => 'phone',
        'label' => 'LBL_ANY_PHONE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      4 => 
      array (
        'name' => 'website',
        'default' => true,
        'width' => '10%',
      ),
      5 => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      6 => 
      array (
        'name' => 'address_street',
        'label' => 'LBL_ANY_ADDRESS',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      7 => 
      array (
        'name' => 'address_city',
        'label' => 'LBL_CITY',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      8 => 
      array (
        'name' => 'address_state',
        'label' => 'LBL_STATE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      9 => 
      array (
        'name' => 'address_postalcode',
        'label' => 'LBL_POSTAL_CODE',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      10 => 
      array (
        'name' => 'billing_address_country',
        'label' => 'LBL_COUNTRY',
        'type' => 'name',
        'options' => 'countries_dom',
        'default' => true,
        'width' => '10%',
      ),
      11 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EDUCATIONAL_INSTITUTION',
        'width' => '10%',
        'name' => 'educational_institution_c',
      ),
      12 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_RETAIL',
        'width' => '10%',
        'name' => 'retail_c',
      ),
      13 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOTEL',
        'width' => '10%',
        'name' => 'hotel_c',
      ),
      14 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CONTRACTOR',
        'width' => '10%',
        'name' => 'contractor_c',
      ),
      15 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HOSPITAL',
        'width' => '10%',
        'name' => 'hospital_c',
      ),
      16 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_BUILDER',
        'width' => '10%',
        'name' => 'builder_c',
      ),
      17 => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PHARMACEUTICAL',
        'width' => '10%',
        'name' => 'pharmaceutical_c',
      ),
      18 => 
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
      19 => 
      array (
        'name' => 'account_type',
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

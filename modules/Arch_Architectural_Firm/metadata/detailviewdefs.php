<?php
$module_name = 'Arch_Architectural_Firm';
$_object_name = 'arch_architectural_firm';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_ADDRESS_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'archi',
            'studio' => 'visible',
            'label' => 'LBL_ARCHI',
          ),
        ),
        1 => 
        array (
          0 => 'website',
          1 => 'phone_office',
        ),
        2 => 
        array (
          0 => 'phone_fax',
          1 => 'phone_alternate',
        ),
        3 => 
        array (
          0 => 'billing_address_street',
          1 => 'shipping_address_street',
        ),
        4 => 
        array (
          0 => 'email1',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 'annual_revenue',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'educational_institution',
            'label' => 'LBL_EDUCATIONAL_INSTITUTION',
          ),
          1 => 
          array (
            'name' => 'pharmaceutical',
            'label' => 'LBL_PHARMACEUTICAL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'residential',
            'label' => 'LBL_RESIDENTIAL',
          ),
          1 => 
          array (
            'name' => 'hospital',
            'label' => 'LBL_HOSPITAL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hotels',
            'label' => 'LBL_HOTELS',
          ),
          1 => 
          array (
            'name' => 'sports',
            'label' => 'LBL_SPORTS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'retail',
            'label' => 'LBL_RETAIL',
          ),
          1 => 
          array (
            'name' => 'others',
            'label' => 'LBL_OTHERS',
          ),
        ),
        5 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
    ),
  ),
);
?>

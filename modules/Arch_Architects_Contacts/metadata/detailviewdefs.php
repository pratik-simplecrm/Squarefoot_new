<?php
$module_name = 'Arch_Architects_Contacts';
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
        'LBL_CONTACT_INFORMATION' => 
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
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 'phone_work',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
          1 => 'phone_mobile',
        ),
        2 => 
        array (
          0 => 'title',
          1 => 'phone_home',
        ),
        3 => 
        array (
          0 => 'department',
          1 => 'phone_other',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'business_potential',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_POTENTIAL',
          ),
          1 => 'phone_fax',
        ),
        5 => 
        array (
          0 => 'email1',
        ),
        6 => 
        array (
          0 => 'primary_address_street',
          1 => 'alt_address_street',
        ),
        7 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'archi_type',
            'studio' => 'visible',
            'label' => 'LBL_ARCHI_TYPE',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'educational_institutional',
            'label' => 'LBL_EDUCATIONAL_INSTITUTIONAL',
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

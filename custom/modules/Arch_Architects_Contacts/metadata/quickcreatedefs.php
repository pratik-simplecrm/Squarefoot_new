<?php
$module_name = 'Arch_Architects_Contacts';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_ADDRESS_INFORMATION' => 
        array (
          'newTab' => true,
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
            'customCode' => '{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 'phone_work',
          1 => 'phone_mobile',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'comment' => 'Street address for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_STREET',
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'comment' => 'Street address for alternate address',
            'label' => 'LBL_ALT_ADDRESS_STREET',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_city',
            'comment' => 'City for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY',
          ),
          1 => 
          array (
            'name' => 'alt_address_city',
            'comment' => 'City for alternate address',
            'label' => 'LBL_ALT_ADDRESS_CITY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_state',
            'comment' => 'State for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_STATE',
          ),
          1 => 
          array (
            'name' => 'alt_address_state',
            'comment' => 'State for alternate address',
            'label' => 'LBL_ALT_ADDRESS_STATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_postalcode',
            'comment' => 'Postal code for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'alt_address_postalcode',
            'comment' => 'Postal code for alternate address',
            'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_country',
            'comment' => 'Country for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'alt_address_country',
            'comment' => 'Country for alternate address',
            'label' => 'LBL_ALT_ADDRESS_COUNTRY',
          ),
        ),
        7 => 
        array (
          0 => 'department',
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'business_potential',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_POTENTIAL',
          ),
          1 => 'phone_fax',
        ),
        9 => 
        array (
          0 => 'email1',
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'arch_architectural_firm_arch_architects_contacts_1_name',
            'label' => 'LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
          ),
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

        ),
      ),
    ),
  ),
);
?>

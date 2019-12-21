<?php
$module_name = 'pdf_Quote_PDF';
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'branch',
            'studio' => 'visible',
            'label' => 'LBL_BRANCH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'vat_no',
            'label' => 'LBL_VAT_NO',
          ),
          1 => 
          array (
            'name' => 'cst_no',
            'label' => 'LBL_CST_NO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'stn',
            'label' => 'LBL_STN',
          ),
          1 => 
          array (
            'name' => 'w',
            'label' => 'LBL_W',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_1_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_1',
          ),
          1 => 
          array (
            'name' => 'state',
            'label' => 'LBL_STATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'pf_no_c',
            'label' => 'LBL_ PF_NO',
          ),
          1 => 
          array (
            'name' => 'esic_no_c',
            'label' => 'LBL_ESIC_NO',
          ),
        ),
      ),
    ),
  ),
);
?>

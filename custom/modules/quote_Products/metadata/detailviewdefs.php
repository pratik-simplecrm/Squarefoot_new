<?php
$module_name = 'quote_Products';
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
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'availability_c',
            'studio' => 'visible',
            'label' => 'LBL_AVAILABILITY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hsn_code_c',
            'label' => 'LBL_HSN_CODE_C',
          ),
          1 => 
          array (
            'name' => 'gst_c',
            'label' => 'LBL_GST',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'sac_code_c',
            'label' => 'LBL_SAC_CODE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'support_term_c',
            'studio' => 'visible',
            'label' => 'LBL_SUPPORT_TERM',
          ),
          1 => 
          array (
            'name' => 'vendor_part_number_c',
            'label' => 'LBL_VENDOR_PART_NUMBER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'quantity_box_c',
            'label' => 'LBL_QUANTITY_BOX',
          ),
          1 => 
          array (
            'name' => 'item_code_c',
            'label' => 'LBL_ITEM_CODE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'quote_product_category_quote_products_name',
          ),
          1 => 
          array (
            'name' => 'tax_class_c',
            'studio' => 'visible',
            'label' => 'LBL_TAX_CLASS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'pricing_factor_c',
            'label' => 'LBL_PRICING_FACTOR',
          ),
          1 => 
          array (
            'name' => 'uom_c',
            'studio' => 'visible',
            'label' => 'LBL_UOM',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'unit_price_c',
            'label' => 'LBL_UNIT_PRICE',
          ),
          1 => 
          array (
            'name' => 'unit_price_euro_c',
            'label' => 'LBL_UNIT_PRICE_EURO',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'prod_spec_c',
            'studio' => 'visible',
            'label' => 'Product Specifications',
          ),
          1 => 
          array (
            'name' => 'sqm_value_c',
            'label' => 'LBL_SQM_VALUE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'is_dutyfree_c',
            'label' => 'LBL_IS_DUTYFREE',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'bangalore_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_BANGALORE_BRANCH',
          ),
          1 => 
          array (
            'name' => 'bangalore_unit_price_c',
            'label' => 'LBL_BANGALORE_UNIT_PRICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'chennai_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_CHENNAI_BRANCH',
          ),
          1 => 
          array (
            'name' => 'chennai_unit_price_c',
            'label' => 'LBL_CHENNAI_UNIT_PRICE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'delhi_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_DELHI_BRANCH',
          ),
          1 => 
          array (
            'name' => 'delhi_unit_price_c',
            'label' => 'LBL_DELHI_UNIT_PRICE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'goa_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_GOA_BRANCH',
          ),
          1 => 
          array (
            'name' => 'goa_unit_price_c',
            'label' => 'LBL_GOA_UNIT_PRICE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'gujarat_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_GUJARAT_BRANCH',
          ),
          1 => 
          array (
            'name' => 'gujarat_unit_price_c',
            'label' => 'LBL_GUJARAT_UNIT_PRICE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'gurgaon_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_GURGAON_BRANCH',
          ),
          1 => 
          array (
            'name' => 'haryana_unit_price_c',
            'label' => 'LBL_HARYANA_UNIT_PRICE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'hyderabad_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_HYDERABAD_BRANCH',
          ),
          1 => 
          array (
            'name' => 'hyderabad_unit_price_c',
            'label' => 'LBL_HYDERABAD_UNIT_PRICE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'kerala_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_KERALA_BRANCH',
          ),
          1 => 
          array (
            'name' => 'kerala_unit_price_c',
            'label' => 'LBL_KERALA_UNIT_PRICE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'kolkata_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_KOLKATA_BRANCH',
          ),
          1 => 
          array (
            'name' => 'kolkata_unit_price_c',
            'label' => 'LBL_KOLKATA_UNIT_PRICE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'noida_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_NOIDA_BRANCH',
          ),
          1 => 
          array (
            'name' => 'up_unit_price_c',
            'label' => 'LBL_UP_UNIT_PRICE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'mumbai_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_MUMBAI_BRANCH',
          ),
          1 => 
          array (
            'name' => 'mumbai_unit_price_c',
            'label' => 'LBL_MUMBAI_UNIT_PRICE',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'pune_branch_c',
            'studio' => 'visible',
            'label' => 'LBL_PUNE_BRANCH',
          ),
          1 => 
          array (
            'name' => 'pune_unit_price_c',
            'label' => 'LBL_PUNE_UNIT_PRICE',
          ),
        ),
      ),
    ),
  ),
);
?>

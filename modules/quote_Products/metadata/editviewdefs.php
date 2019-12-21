<?php
$module_name = 'quote_Products';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'prod_manufacturer_c',
            'studio' => 'visible',
            'label' => 'Manufacturer',
          ),
          1 => 
          array (
            'name' => 'quote_product_category_quote_products_name',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'prod_spec_c',
            'studio' => 'visible',
            'label' => 'Product Specifications',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'product_price_c',
            'label' => 'LBL_PRODUCT_PRICE_C',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>

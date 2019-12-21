<?php
// created: 2016-08-09 21:52:13
$viewdefs['quote_Quotes']['EditView'] = array (
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
      'LBL_EDITVIEW_PANEL1' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
      'LBL_EDITVIEW_PANEL2' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
      'LBL_EDITVIEW_PANEL3' => 
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
        0 => 
        array (
          'name' => 'quote_quotes_number',
          'type' => 'readonly',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'quote_type',
          'studio' => 'visible',
          'label' => 'LBL_QUOTE_TYPE',
        ),
        1 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'size' => 60,
          ),
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO_NAME',
        ),
        1 => 
        array (
          'name' => 'quotation_status',
          'studio' => 'visible',
          'label' => 'LBL_QUOTATION_STATUS',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'quote_quotes_accounts_name',
          'label' => 'LBL_QUOTE_QUOTES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        ),
        1 => 
        array (
          'name' => 'quote_quotes_opportunities_name',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'quote_quotes_leads_name',
        ),
        1 => 
        array (
          'name' => 'quotation_date',
          'label' => 'LBL_QUOTATION_DATE',
        ),
      ),
    ),
    'lbl_editview_panel1' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'tax',
          'studio' => 'visible',
          'label' => 'LBL_TAX',
        ),
        1 => 
        array (
          'name' => 'spares',
          'studio' => 'visible',
          'label' => 'LBL_SPARES',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'discount',
          'label' => 'LBL_DISCOUNT',
        ),
        1 => 
        array (
          'name' => 'discount_checkbox',
          'label' => 'LBL_DISCOUNT_CHECKBOX',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'insurance',
          'label' => 'LBL_INSURANCE',
        ),
        1 => 
        array (
          'name' => 'insurance_checkbox',
          'label' => 'LBL_INSURANCE_CHECKBOX',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'freight_charge',
          'label' => 'LBL_FREIGHT_CHARGE',
        ),
        1 => 
        array (
          'name' => 'currency',
          'label' => 'LBL_CURRENCY',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'terms_conditions',
          'studio' => 'visible',
          'label' => 'LBL_TERMS_CONDITIONS',
        ),
      ),
    ),
    'lbl_editview_panel2' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'quantity1',
          'label' => 'LBL_QUANTITY1',
        ),
        1 => 
        array (
          'name' => 'product1',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT1',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'quantity2',
          'label' => 'LBL_QUANTITY2',
        ),
        1 => 
        array (
          'name' => 'product2',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT2',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'quantity3',
          'label' => 'LBL_QUANTITY3',
        ),
        1 => 
        array (
          'name' => 'product3',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT3',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'quantity4',
          'label' => 'LBL_QUANTITY4',
        ),
        1 => 
        array (
          'name' => 'product4',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT4',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'quantity5',
          'label' => 'LBL_QUANTITY5',
        ),
        1 => 
        array (
          'name' => 'product5',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT5',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'quantity6',
          'label' => 'LBL_QUANTITY6',
        ),
        1 => 
        array (
          'name' => 'product6',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT6',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'quantity7',
          'label' => 'LBL_QUANTITY7',
        ),
        1 => 
        array (
          'name' => 'product7',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT7',
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'quantity8',
          'label' => 'LBL_QUANTITY8',
        ),
        1 => 
        array (
          'name' => 'product8',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT8',
        ),
      ),
      8 => 
      array (
        0 => 
        array (
          'name' => 'quantity9',
          'label' => 'LBL_QUANTITY9',
        ),
        1 => 
        array (
          'name' => 'product9',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT9',
        ),
      ),
      9 => 
      array (
        0 => 
        array (
          'name' => 'quantity10',
          'label' => 'LBL_QUANTITY10',
        ),
        1 => 
        array (
          'name' => 'product10',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT10',
        ),
      ),
    ),
    'lbl_editview_panel3' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'quantity11',
          'label' => 'LBL_QUANTITY11',
        ),
        1 => 
        array (
          'name' => 'product11',
          'label' => 'LBL_PRODUCT11',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'quantity12',
          'label' => 'LBL_QUANTITY12',
        ),
        1 => 
        array (
          'name' => 'product12',
          'label' => 'LBL_PRODUCT12',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'quantity13',
          'label' => 'LBL_QUANTITY13',
        ),
        1 => 
        array (
          'name' => 'product13',
          'label' => 'LBL_PRODUCT13',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'quantity14',
          'label' => 'LBL_QUANTITY14',
        ),
        1 => 
        array (
          'name' => 'product14',
          'label' => 'LBL_PRODUCT14',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'quantity15',
          'label' => 'LBL_QUANTITY15',
        ),
        1 => 
        array (
          'name' => 'product15',
          'label' => 'LBL_PRODUCT15',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'quantity16',
          'label' => 'LBL_QUANTITY16',
        ),
        1 => 
        array (
          'name' => 'product16',
          'label' => 'LBL_PRODUCT16',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'quantity17',
          'label' => 'LBL_QUANTITY17',
        ),
        1 => 
        array (
          'name' => 'product17',
          'label' => 'LBL_PRODUCT17',
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'quantity18',
          'label' => 'LBL_QUANTITY18',
        ),
        1 => 
        array (
          'name' => 'product18',
          'label' => 'LBL_PRODUCT18',
        ),
      ),
      8 => 
      array (
        0 => 
        array (
          'name' => 'quantity19',
          'label' => 'LBL_QUANTITY19',
        ),
        1 => 
        array (
          'name' => 'product19',
          'label' => 'LBL_PRODUCT19',
        ),
      ),
      9 => 
      array (
        0 => 
        array (
          'name' => 'quantity20',
          'label' => 'LBL_QUANTITY20',
        ),
        1 => 
        array (
          'name' => 'product20',
          'label' => 'LBL_PRODUCT20',
        ),
      ),
      10 => 
      array (
        0 => 
        array (
          'name' => 'quantity21',
          'label' => 'LBL_QUANTITY21',
        ),
        1 => 
        array (
          'name' => 'product21',
          'label' => 'LBL_PRODUCT21',
        ),
      ),
      11 => 
      array (
        0 => 
        array (
          'name' => 'quantity22',
          'label' => 'LBL_QUANTITY22',
        ),
        1 => 
        array (
          'name' => 'product22',
          'label' => 'LBL_PRODUCT22',
        ),
      ),
      12 => 
      array (
        0 => 
        array (
          'name' => 'quantity23',
          'label' => 'LBL_QUANTITY23',
        ),
        1 => 
        array (
          'name' => 'product23',
          'label' => 'LBL_PRODUCT23',
        ),
      ),
      13 => 
      array (
        0 => 
        array (
          'name' => 'quantity24',
          'label' => 'LBL_QUANTITY24',
        ),
        1 => 
        array (
          'name' => 'product24',
          'label' => 'LBL_PRODUCT24',
        ),
      ),
      14 => 
      array (
        0 => 
        array (
          'name' => 'quantity25',
          'label' => 'LBL_QUANTITY25',
        ),
        1 => 
        array (
          'name' => 'product25',
          'label' => 'LBL_PRODUCT25',
        ),
      ),
      15 => 
      array (
        0 => 
        array (
          'name' => 'quantity26',
          'label' => 'LBL_QUANTITY26',
        ),
        1 => 
        array (
          'name' => 'product26',
          'label' => 'LBL_PRODUCT26',
        ),
      ),
      16 => 
      array (
        0 => 
        array (
          'name' => 'quantity27',
          'label' => 'LBL_QUANTITY27',
        ),
        1 => 
        array (
          'name' => 'product27',
          'label' => 'LBL_PRODUCT27',
        ),
      ),
      17 => 
      array (
        0 => 
        array (
          'name' => 'quantity28',
          'label' => 'LBL_QUANTITY28',
        ),
        1 => 
        array (
          'name' => 'product28',
          'label' => 'LBL_PRODUCT28',
        ),
      ),
      18 => 
      array (
        0 => 
        array (
          'name' => 'quantity29',
          'label' => 'LBL_QUANTITY29',
        ),
        1 => 
        array (
          'name' => 'product29',
          'label' => 'LBL_PRODUCT29',
        ),
      ),
      19 => 
      array (
        0 => 
        array (
          'name' => 'quantity30',
          'label' => 'LBL_QUANTITY30',
        ),
        1 => 
        array (
          'name' => 'product30',
          'label' => 'LBL_PRODUCT30',
        ),
      ),
      20 => 
      array (
        0 => 
        array (
          'name' => 'quantity31',
          'label' => 'LBL_QUANTITY31',
        ),
        1 => 
        array (
          'name' => 'product31',
          'label' => 'LBL_PRODUCT31',
        ),
      ),
      21 => 
      array (
        0 => 
        array (
          'name' => 'quantity32',
          'label' => 'LBL_QUANTITY32',
        ),
        1 => 
        array (
          'name' => 'product32',
          'label' => 'LBL_PRODUCT32',
        ),
      ),
      22 => 
      array (
        0 => 
        array (
          'name' => 'quantity33',
          'label' => 'LBL_QUANTITY33',
        ),
        1 => 
        array (
          'name' => 'product33',
          'label' => 'LBL_PRODUCT33',
        ),
      ),
      23 => 
      array (
        0 => 
        array (
          'name' => 'quantity34',
          'label' => 'LBL_QUANTITY34',
        ),
        1 => 
        array (
          'name' => 'product34',
          'label' => 'LBL_PRODUCT34',
        ),
      ),
      24 => 
      array (
        0 => 
        array (
          'name' => 'quantity35',
          'label' => 'LBL_QUANTITY35',
        ),
        1 => 
        array (
          'name' => 'product35',
          'label' => 'LBL_PRODUCT35',
        ),
      ),
    ),
  ),
);
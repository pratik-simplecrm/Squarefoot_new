<?php
$module_name = 'quote_Quote';
$_object_name = 'quote_quote';
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
          4 => 
          array (
            'customCode' => '<input title="Print as PDF" accesskey="M" class="button" onclick="this.form.return_module.value=\'quote_Quote\';this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'printPdf\'; this.form.module.value=\'quote_Quote\';" name="button" value="Print as PDF" type="submit">',
          ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/quote_Quote/line_items/detailLineItem.js',
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
        'LBL_EDITVIEW_PANEL14' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL12' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL15' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL13' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL10' => 
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
          0 => 'name',
          1 => 
          array (
            'name' => 'quote_quote_opportunities_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'custom_quote_num_c',
            'label' => 'LBL_CUSTOM_QUOTE_NUM_C',
          ),
          1 => 
          array (
            'name' => 'quotation_status',
            'studio' => 'visible',
            'label' => 'LBL_QUOTATION_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'purchase_order_number_c',
            'label' => 'LBL_PURCHASE_ORDER_NUMBER',
          ),
          1 => 
          array (
            'name' => 'valid_until_c',
            'label' => 'LBL_VALID_UNTIL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'payment_terms_c',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_TERMS',
          ),
          1 => 
          array (
            'name' => 'original_p_o_date_c',
            'label' => 'LBL_ORIGINAL_P_O_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'branch_c',
            'studio' => 'visible',
            'label' => 'LBL_BRANCH',
          ),
          1 => 'assigned_user_name',
        ),
      ),
      'lbl_editview_panel14' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quote_quote_accounts_name',
          ),
          1 => 
          array (
            'name' => 'accounts_quote_quote_1_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_name_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
          ),
          1 => 
          array (
            'name' => 'contact_name_shipping_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME_SHIPPING',
          ),
        ),
      ),
      'lbl_editview_panel12' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_c',
            'label' => 'LBL_BILLING_ADDRESS',
            'customCode' => '{$fields.billing_address_c.value}<br/>
							  {$fields.billing_address_city_c.value}<br/>
							  {$fields.billing_address_state_c.value}
							  {$fields.billing_address_postalcode_c.value}<br/> 
			                  {$fields.billing_address_country_c.value}<br/> ',
          ),
          1 => 
          array (
            'name' => 'shipping_address_c',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'customCode' => '{$fields.shipping_address_c.value}<br/>
							  {$fields.shipping_address_city_c.value}<br/>
							  {$fields.shipping_address_state_c.value}
							  {$fields.shipping_address_postalcode_c.value}<br/> 
			                  {$fields.shipping_address_country_c.value}<br/> ',
          ),
        ),
      ),
      'lbl_detailview_panel15' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quote_line_item_layout_c',
            'label' => 'LBL_QUOTE_LINE_ITEM_LAYOUT',
          ),
        ),
      ),
      'lbl_editview_panel13' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sub_total',
            'label' => 'LBL_SUB_TOTAL',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'discount',
            'label' => 'LBL_DISCOUNT',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'discounted_total',
            'label' => 'LBL_DISCOUNTED_TOTAL',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'total_tax',
            'label' => 'LBL_TOTAL_TAX',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'shipping_c',
            'label' => 'LBL_SHIPPING',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'grand_total',
            'label' => 'LBL_GRAND_TOTAL',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel10' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'terms_conditions',
            'studio' => 'visible',
            'label' => 'LBL_TERMS_CONDITIONS',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'decleration_c',
            'studio' => 'visible',
            'label' => 'LBL_DECLERATION',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'certify_c',
            'studio' => 'visible',
            'label' => 'LBL_CERTIFY',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'company_vat_details_c',
            'studio' => 'visible',
            'label' => 'LBL_COMPANY_VAT_DETAILS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>

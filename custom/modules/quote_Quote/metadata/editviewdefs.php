<?php
$module_name = 'quote_Quote';
$_object_name = 'quote_quote';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '<input type="submit" value="Save" name="button" onclick="this.form.action.value=\'Save\'; if(  check_form(\'EditView\') && checkOppAcc())return true;else return false;" class="button primary" accesskey="S" title="Save [Alt+S]" id="SAVE_HEADER">',
          ),
          1 => 'CANCEL',
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
          'file' => 'custom/modules/quote_Quote/line_items/lineItem.php',
        ),
      ),
      'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight()  {ldelim} if( shipping_checkbox.checked  ){ldelim} shipping_address_c.value = billing_address_c.value;shipping_address_city_c.value = billing_address_city_c.value;shipping_address_state_c.value = billing_address_state_c.value;shipping_address_postalcode_c.value = billing_address_postalcode_c.value;shipping_address_country_c.value = billing_address_country_c.value; return true; {rdelim} {rdelim} function copyAddressLeft()  {ldelim} billing_address_c.value =shipping_address_c.value;billing_address_city_c.value = shipping_address_city_c.value;billing_address_state_c.value = shipping_address_state_c.value;billing_address_postalcode_c.value =shipping_address_postalcode_c.value;billing_address_country_c.value = shipping_address_country_c.value;return true; {rdelim} </script>',
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
        'LBL_EDITVIEW_PANEL16' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL12' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL11' => 
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
        'LBL_EDITVIEW_PANEL15' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
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
            'displayParams' => 
            array (
              'size' => 60,
            ),
          ),
          1 => 
          array (
            'name' => 'quote_quote_opportunities_name',
            'displayParams' => 
            array (
              'required' => true,
              'field' => 
              array (
                'onblur' => 'fetchCust()',
              ),
              'javascript' => 
              array (
                'btn' => 'onfocus="fetchCust()"',
              ),
              'initial_filter' => '&account_id="+c_id+"',
            ),
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
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'dutyfree_c',
            'studio' => 'visible',
            'label' => 'LBL_DUTYFREE',
          ),
        ),
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'branch_c',
            'studio' => 'visible',
            'label' => 'LBL_BRANCH',
          ),
          1 => 
          array (
            'name' => 'customer_type_c',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMER_TYPE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'copy_address_c',
            'studio' => 'visible',
          ),
          1 => 'assigned_user_name',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'old_pli_c',
            'studio' => 'visible',
            'label' => 'LBL_OLD_PLI',
          ),
          1 => 
          array (
            'name' => 'shipping_1_c',
            'label' => 'LBL_SHIPPING_1',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'pdf_type_c',
            'studio' => 'visible',
            'label' => 'LBL_PDF_TYPE',
          ),
          1 => 
          array (
            'name' => 'shipping_2_c',
            'label' => 'LBL_SHIPPING_2',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'approval_status_c',
            'studio' => 'visible',
            'label' => 'LBL_APPROVAL_STATUS',
          ),
          1 => 
          array (
            'name' => 'approval_issue_c',
            'studio' => 'visible',
            'label' => 'LBL_APPROVAL_ISSUE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'unregistered_user_c',
            'label' => 'LBL_UNREGISTERED_USER',
          ),
        ),
      ),
      'lbl_editview_panel14' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quote_quote_accounts_name',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onblur' => 'checkUnit()',
              ),
              'javascript' => 
              array (
                'btn' => 'onfocus="checkUnit()"',
              ),
              'required' => true,
              'initial_filter' => '&id_advanced="+c_id+"',
            ),
          ),
          1 => 
          array (
            'name' => 'accounts_quote_quote_1_name',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onblur' => 'checkUnit1()',
              ),
              'javascript' => 
              array (
                'btn' => 'onfocus="checkUnit1()"',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_name_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&account_name_advanced="+encodeURIComponent(document.getElementById("quote_quote_accounts_name").value)+"',
            ),
          ),
          1 => 
          array (
            'name' => 'contact_name_shipping_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME_SHIPPING',
            'displayParams' => 
            array (
              'initial_filter' => '&account_name_advanced="+encodeURIComponent(document.getElementById("accounts_quote_quote_1_name").value)+"',
            ),
          ),
        ),
      ),
      'lbl_editview_panel16' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'packing_charges_c',
            'label' => 'LBL_PACKING_CHARGES',
          ),
          1 => 
          array (
            'name' => 'freight_charges_c',
            'label' => 'LBL_FREIGHT_CHARGES',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'loading_unloading_charges_c',
            'label' => 'LBL_LOADING_UNLOADING_CHARGES_C',
          ),
          1 => 
          array (
            'name' => 'other_charges_c',
            'label' => 'LBL_OTHER_CHARGES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'structure_details_c',
            'label' => 'LBL_STRUCTURE_DETAILS',
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
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
            'customCode' => '
				<script src="include/SugarFields/Fields/Address/SugarFieldAddress.js?v=bIUEf6JmnnhrcaSYcqaFfw" type="text/javascript"></script>
				<fieldset id="Billing_address_c_fieldset">
				<legend>Billing Address</legend>
				<table width="100%" cellspacing="1" cellpadding="0" border="0" class="edit">
				<tbody>
				<tr>
					<td width="25%" valign="top" scope="row" id="billing_address_c_label"><label for="billing_address_c">Address:</label></td>
					<td width="*"><textarea tabindex="0" cols="30" rows="2" maxlength="150" name="billing_address_c" id="billing_address_c">{$fields.billing_address_c.value|nl2br|strip_tags|url2html}</textarea></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="billing_address_city_c_label"><label for="billing_address_city_c">City:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.billing_address_city_c.value}" maxlength="150" size="30" id="billing_address_city_c" name="billing_address_city_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="billing_address_state_c_label"><label for="billing_address_state_c">State:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.billing_address_state_c.value}" maxlength="150" size="30" id="billing_address_state_c" name="billing_address_state_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="billing_address_postalcode_c_label"><label for="billing_address_postalcode_c">Postal Code:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.billing_address_postalcode_c.value}" maxlength="150" size="30" id="billing_address_postalcode_c" name="billing_address_postalcode_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="billing_address_country_c_label"><label for="billing_address_country_c">Country:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.billing_address_country_c.value}" maxlength="150" size="30" id="billing_address_country_c" name="billing_address_country_c"></td>
				</tr>
				<tr>
					<td nowrap="" colspan="2">&nbsp;</td>
				</tr>
				</tbody></table>
				</fieldset>',
          ),
          1 => 
          array (
            'name' => 'shipping_address_c',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
            'customCode' => '			
				<script src="include/SugarFields/Fields/Address/SugarFieldAddress.js?v=bIUEf6JmnnhrcaSYcqaFfw" type="text/javascript"></script>
				<fieldset id="Shipping_address_c_fieldset">
				<legend>Shipping Address</legend>
				<table width="100%" cellspacing="1" cellpadding="0" border="0" class="edit">
				<tbody>
				<tr>
					<td width="25%" valign="top" scope="row" id="shipping_address_c_label"><label for="shipping_address_c">Shipping Address:</label></td>
					<td width="*"><textarea tabindex="0" cols="30" rows="2" maxlength="150" name="shipping_address_c" id="shipping_address_c">{$fields.shipping_address_c.value|nl2br|strip_tags|url2html}</textarea></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="shipping_address_city_c_label"><label for="shipping_address_city_c">City:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.shipping_address_city_c.value}" maxlength="150" size="30" id="shipping_address_city_c" name="shipping_address_city_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="shipping_address_state_c_label"><label for="shipping_address_state_c">State:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.shipping_address_state_c.value}" maxlength="150" size="30" id="shipping_address_state_c" name="shipping_address_state_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="shipping_address_postalcode_c_label"><label for="shipping_address_postalcode_c">Postal Code:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.shipping_address_postalcode_c.value}" maxlength="150" size="30" id="shipping_address_postalcode_c" name="shipping_address_postalcode_c"></td>
				</tr>
				<tr>
					<td width="%" scope="row" id="shipping_address_country_c_label"><label for="shipping_address_country_c">Country:</label></td>
					<td><input type="text" tabindex="0" value ="{$fields.shipping_address_country_c.value}" maxlength="150" size="30" id="shipping_address_country_c" name="shipping_address_country_c"></td>
				</tr>
				<tr>
					<td nowrap="" scope="row">Copy address from left:</td>
					<td><input type="checkbox" onclick="copyAddressRight();" name="shipping_checkbox" id="shipping_checkbox"></td>
				</tr>
				</tbody></table>
				</fieldset>',
          ),
        ),
      ),
      'lbl_editview_panel11' => 
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'discount',
            'label' => 'LBL_DISCOUNT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'discounted_total',
            'label' => 'LBL_DISCOUNTED_TOTAL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'shipping_c',
            'label' => 'LBL_SHIPPING',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'total_tax',
            'label' => 'LBL_TOTAL_TAX',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cess_amount_c',
            'label' => 'LBL_CESS_AMOUNT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'grand_total',
            'label' => 'LBL_GRAND_TOTAL',
          ),
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'decleration_c',
            'studio' => 'visible',
            'label' => 'LBL_DECLERATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'certify_c',
            'studio' => 'visible',
            'label' => 'LBL_CERTIFY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'company_vat_details_c',
            'studio' => 'visible',
            'label' => 'LBL_COMPANY_VAT_DETAILS',
          ),
        ),
      ),
      'lbl_editview_panel15' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
?>

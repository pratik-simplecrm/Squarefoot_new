<?php

ini_set("display_errors", 'Off');

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

if (file_exists('include/tcpdf/config/lang/eng.php')) {
    include_once('include/tcpdf/config/lang/eng.php');
} else {
    die('TCPDF lang not found');
}
if (file_exists('include/tcpdf/config/tcpdf_config.php')) {
    include_once('include/tcpdf/config/tcpdf_config.php');
} else {
    die('TCPDF config not found');
}
if (file_exists('include/tcpdf/tcpdf.php')) {
    include_once('include/tcpdf/tcpdf.php');
} else {
    die('TCPDF not found');
}

//pdf for quotes
class QuotePdf extends TCPDF {

    private $file_name;
    private $email_id;
    private $footer_text;

    public function printPdf($quote_id, $action = null) {

        global $app_list_strings;
        $db = DBManagerFactory::getInstance();


        //get the quote id
        //$quote_id = $_REQUEST['record'];
        //fetch the quote details
        $qObj = $this->getMyBean('quote_Quote', $quote_id);
		
		//code written by pratik on 07082019 start (kerala 1% cess)
		$get_barnch_unuser = "SELECT `branch_c`,`unregistered_user_c`,`cess_amount_c`,`dutyfree_c` FROM `quote_quote_cstm` WHERE `id_c`='$quote_id'";
		$get_barnch_unuser_res = $db->query($get_barnch_unuser);
		$get_barnch_unuser_row = $db->fetchByAssoc($get_barnch_unuser_res);
		$branch_nm = trim($get_barnch_unuser_row['branch_c']);
		$unregistered_user = trim($get_barnch_unuser_row['unregistered_user_c']);
		$cess_amt_kerala = trim(number_format($get_barnch_unuser_row['cess_amount_c'],2));
		

        /* get currency code starts added on 30 jan 2020 by pratik */
        $get_currency_id = "SELECT `currency_id` FROM `quote_quote` WHERE `id`='$quote_id'";
        $get_currency_id_res = $db->query($get_currency_id);
        $get_currency_id_row = $db->fetchByAssoc($get_currency_id_res);
        $currency_id = $get_currency_id_row['currency_id'];

        $get_currency = "SELECT `symbol` FROM `currencies` WHERE `id`='$currency_id'";
        $get_currency_res = $db->query($get_currency);
        $get_currency_row = $db->fetchByAssoc($get_currency_res);
        $currency_name = $get_currency_row['symbol']." ";
        if($currency_id=='-99')
        {
           $currency_name = 'Rs. ';
        }
        //echo "currency_name:".$currency_name;
        //exit;
        /* get currency code end */

		/* code added for Duty free quote header added on 25-11-2019 CR-DUTY/INR FREE */
		$dutyfree_c = trim($get_barnch_unuser_row['dutyfree_c']);
		$quote_header = '';
      
		
		
   

        $this->file_name = $qObj->name;
        $subtotal = number_format($qObj->sub_total, 2);
        $discountAmt = number_format($qObj->discount, 2);
        $total_discount = number_format($qObj->discounted_total, 2);
        $totaltax = number_format($qObj->total_tax, 2);
        $shipping_amt = number_format($qObj->shipping_c, 2);
        if (!isset($qObj->shipping_c) || empty($qObj->shipping_c))
            $shipping_amt = number_format(0, 2);
        $grand_total = number_format($qObj->grand_total, 2);
        $terms_conditions = $qObj->terms_conditions;
        $decleration = $qObj->decleration_c;
        $certify = $qObj->certify_c;
        //$company_vat_details = $qObj->company_vat_details_c;
        $assigned_user_id = $qObj->assigned_user_id;
        $valid_until = date('d-m-Y', strtotime($qObj->valid_until_c));
        //$quote_quote_number  = $qObj->quote_quote_number;
        $quote_quote_number = $qObj->custom_quote_num_c;
        $branch = $qObj->branch_c;
        $packing_charges = $qObj->packing_charges_c;
        $freight_charges = $qObj->freight_charges_c;
        $loading_charges = $qObj->loading_unloading_charges_c;
        $other_charges = $qObj->other_charges_c;
        $structure_details = $qObj->structure_details_c;
        $current_date = date('d-m-Y');

        $pdf_type = $qObj->pdf_type_c;

        if(isset($dutyfree_c) && $dutyfree_c!='')
        {
           if($dutyfree_c =='INRDutyFree')
            {
                $quote_header = 'INR-Duty Free Quote';
               
            }
            if($dutyfree_c =='EURODutyFree')
            {
                $quote_header = 'Euro-Duty Free Quote';
                
            } 
        }else{
                if ($pdf_type == 'Quote' || $pdf_type == '') 
                {
                    $quote_header = 'Quote';
                }
                else{
                    $quote_header = 'Proforma Invoice';
                   
                 }
        }
        //code written by pratik on 07082019 end (kerala 1% cess)
        if ($pdf_type == 'Quote' || $pdf_type == '') {
            $pdf_type = 'Quote';
        } else {
            $pdf_type = 'Proforma Invoice';
        }

        $UserObj = $this->getMyBean('Users', $assigned_user_id, 'User');
        $sale_person = $UserObj->first_name . ' ' . $UserObj->last_name;
        $sale_person_email = $UserObj->email1;
        $sale_person_mobile = $UserObj->phone_mobile;
        $quote_stage = $qObj->quotation_status;

        $query = $db->query("SELECT * FROM pdf_quote_pdf as pdf
										JOIN pdf_quote_pdf_cstm AS pdf_c ON
										(pdf.id=pdf_c.id_c)
										WHERE pdf.branch='$branch'
										AND pdf.deleted=0 LIMIT 0,1");
        $query_result = $db->fetchByAssoc($query);
        $company_vat_details_v = "GST No: " . $query_result['vat_no'] . "\n";
        $company_vat_details_cs = "Company CIN No: " . $query_result['cst_no'] . "\n";
        //$company_vat_details_s  = "Service Tax No: ".$query_result['stn']."\n";
        $company_vat_details_w = "W.e.f.: " . $query_result['w'] . "\n";
        $company_vat_details_b = "Branch: " . $query_result['branch'] . "\n";
        $company_vat_details_st = "State: " . $query_result['state'] . "\n";
        $company_vat_details_a = "Address: " . $query_result['address_1_c'];
        $company_vat_details_pf = "P.F.No.: " . $query_result['pf_no_c'];
        $company_vat_details_es = "ESIC No.: " . $query_result['esic_no_c'];

        //fetch related lead, account and opportunity details
        $rel_lead_id = ($qObj->quote_quote_leadsleads_ida != '') ? $qObj->quote_quote_leadsleads_ida : '';
        $rel_lead_name = ($qObj->quote_quote_leads_name != '') ? $qObj->quote_quote_leads_name : '';
        $rel_account_id = ($qObj->quote_quote_accountsaccounts_ida != '') ? $qObj->quote_quote_accountsaccounts_ida : '';
        $rel_account_id_1 = ($qObj->accounts_quote_quote_1accounts_ida != '') ? $qObj->accounts_quote_quote_1accounts_ida : '';
        $rel_opp_id = ($qObj->quote_quote_opportunitiesopportunities_ida != '') ? $qObj->quote_quote_opportunitiesopportunities_ida : '';

        $bean1 = BeanFactory::getBean('quote_QuoteProducts');
        $qp_list = $bean1->get_list("", "quote_quoteproducts.quote_id = '" . $quote_id . "'");

        $products = array();
        $i = 0;
        foreach ($qp_list['list'] as $prodList) {
            $products[$i]['name'] = $prodList->name;
            $products[$i]['price'] = $prodList->price;
            $products[$i]['quantity'] = $prodList->quantity;
            $products[$i]['amount'] = ($prodList->price) * ($prodList->quantity);
            $products[$i]['discount'] = $prodList->discount;
            $products[$i]['dis_check'] = $prodList->dis_check;
            $products[$i]['dis_total'] = $prodList->discounted_price;
            $products[$i]['tax'] = $prodList->tax;
            $i++;
        }

        //use getBean() method to retrieve related account bean
        //getBean() method expects three parameters; For reference look last function
        $rel_acc_obj = ($rel_account_id != '') ? $this->getMyBean('Accounts', $rel_account_id, 'Account') : NULL;

        if (isset($rel_acc_obj)) {
            $this->email_id = (!empty($rel_acc_obj->email1) && !$rel_acc_obj->email_opt_out) ? $rel_acc_obj->email1 : NULL;
            $acc_lead_details = "&nbsp;" . $rel_acc_obj->name
                    . "<br />&nbsp;" . $rel_lead_name
                    . "<br />&nbsp;" . $rel_acc_obj->billing_address_street
                    . "<br />&nbsp;" . $rel_acc_obj->billing_address_city
                    . "<br />&nbsp;" . $rel_acc_obj->billing_address_state
                    . "<br />&nbsp;" . $rel_acc_obj->billing_address_postalcode
                    . "<br />&nbsp;" . $rel_acc_obj->billing_address_country;
        }

        $rel_acc_obj = ($rel_account_id_1 != '') ? $this->getMyBean('Accounts', $rel_account_id_1, 'Account') : NULL;
        if (isset($rel_acc_obj)) {
            $this->email_id = (!empty($rel_acc_obj->email1) && !$rel_acc_obj->email_opt_out) ? $rel_acc_obj->email1 : NULL;
            $acc_lead_details1 = "&nbsp;" . $rel_acc_obj->name
                    . "<br />&nbsp;" . $rel_acc_obj->first_name . "&nbsp;" . $rel_acc_obj->last_name
                    . "<br />&nbsp;" . $qObj->shipping_address_c
                    . "<br />&nbsp;" . $qObj->shipping_address_city_c
                    . "<br />&nbsp;" . $qObj->shipping_address_state_c
                    . "<br />&nbsp;" . $qObj->shipping_address_postalcode_c
                    . "<br />&nbsp;" . $qObj->shipping_address_country_c;
            //."<br />&nbsp;".$rel_acc_obj->shipping_address_street
            //."<br />&nbsp;".$rel_acc_obj->shipping_address_city
            //."<br />&nbsp;".$rel_acc_obj->shipping_address_state
            //."<br />&nbsp;".$rel_acc_obj->shipping_address_postalcode
            //."<br />&nbsp;".$rel_acc_obj->shipping_address_country;
            //."<br />&nbsp;".$rel_acc_obj->first_name."&nbsp;".$rel_acc_obj->last_name
        }

        /*
          foreach($products as $product) {

          $discount = ($product[dis_check]) ? $product[discount].' %' : 'Rs '.$product[discount];
          $dis_total = ($product[dis_check]) ? ($product[amount] - ($product[amount]*$product[discount])/100) : ($product[price]-$product[discount])*$product[quantity];
          $table_body.= '<tr>
          <td width="60%">'.$product[quantity].'</td>
          <td width="200%">'.$product[name].'</td>
          <td width="70%">'.$product[amount].'</td>
          <td width="70%">'.$discount.'</td>
          <td width="110%">'.$dis_total.'</td>
          </tr>';
          }
         */


        $productCount = 0;
        $installationCount = 0;
        $otherCount = 0;

        $get_group_type = "SELECT group_type_c FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 ORDER BY group_type_c";
        $get_group_type_res = $db->query($get_group_type);
        while ($get_group_type_row = $db->fetchByAssoc($get_group_type_res)) {
            if ($get_group_type_row['group_type_c'] == 'Product' && $productCount == 0) {

                //~ $get_acc_details="SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Product' order by group_id_c";
                $get_acc_details = "SELECT *,SUBSTRING(group_id_c,1,1) as GroupID1,SUBSTRING(group_id_c,3,2) as GroupID2 FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Product' order by GroupID1,abs(GroupID2)";
                $get_acc_details_res = $db->query($get_acc_details);

                $Pricing_list_row .= '<tr><td><b>Product</b></td></tr>';
                $Pricing_list_row .= '<tr>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="20%"><b>S. #</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="50%"><b>Item Code</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="120%"><b> Product</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> HSN CODE</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> Quantity</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="30%"><b> UOM</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="50%"><b> Unit Price</b></td>';
                //$Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> Other Charges</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="30%"><b> GST %</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> GST Value</b></td>';
                $Pricing_list_row .= '<td bgcolor="#4B4B4B" style="color:#fff" width="60%"><b> Price</b></td>';
                $Pricing_list_row .= '</tr>';
                $prodSrNo = 0;
                $subTotal = 0;
                $discount = 0;
                $discountedPrice = 0;
                $TaxPrice = 0;
                $gst_array = array();
                while ($get_acc__row = $db->fetchByAssoc($get_acc_details_res)) {

                    $prod_id = $get_acc__row['product_id'];
                    $prod_name = $get_acc__row['name'];
                    if ($prod_name != 'Delivery charges') {
                        $getProd = "SELECT name,item_code_c FROM quote_products,quote_products_cstm WHERE id = '$prod_id' AND id=id_c AND deleted =0";
                        $getProd_res = $db->query($getProd);
                        $getProd_row = $db->fetchByAssoc($getProd_res);

                        $new_spec_val = $get_acc__row['product_specification_c'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);
                        $discountPrice = $get_acc__row['discount_c'];
                        if ($get_acc__row['discount_c'] < 50) {
                            $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                        } else {
                            if (intval($get_acc__row['dis_check']) == 1) {
                                $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                            }
                        }
                        $amount = $get_acc__row['quantity'] * $get_acc__row['price_c'] - $get_acc__row['quantity'] * $discountPrice;
                        //echo "<br>";
                        // $gst_value = $amount *($get_acc__row['service_tax_c']/100);
                        // $Pricing_list_row .="<td>".number_format($gst_value,2)."</td>";
                        $dis_total = ($get_acc__row['price_c'] - $discountPrice);
                        $distotal = $amount + $get_acc__row['other_charges_c'];
                        $dis_tax_total = $distotal * ($get_acc__row['service_tax_c'] / 100);
                        $total = $dis_tax_total;
                        $Pricing_list_row .= '<tr>';
                        $Pricing_list_row .= '<td width="20%">' . ++$prodSrNo . '</td>';
                        $Pricing_list_row .= '<td width="50%">' . $getProd_row['item_code_c'] . '</td>';
                        $Pricing_list_row .= '<td width="120%">' . $getProd_row['name'] . "<br/>" . $new_spec_val . "</td>";
                        $Pricing_list_row .= '<td width="40%">' . $get_acc__row['code_c'] . '</td>';
                        $Pricing_list_row .= '<td width="40%">' . (float)$get_acc__row['quantity'] . '</td>';
                        $Pricing_list_row .= '<td width="30%">' . $get_acc__row['uom_c'] . '</td>';
                        $Pricing_list_row .= '<td width="50%" >' . number_format($get_acc__row['price_c'], 2) . '</td>';
                        //$Pricing_list_row .= '<td width="40%">' . number_format($get_acc__row['other_charges_c'], 2) . '</td>';

                        $Pricing_list_row .= '<td width="30%">' . $get_acc__row['service_tax_c'] . '</td>';
                        $Pricing_list_row .= '<td width="40%">' . number_format($dis_tax_total, 2) . '</td>';
                        $Pricing_list_row .= '<td width="60%">'.$currency_name.'' . number_format(($get_acc__row['quantity'])*$get_acc__row['price_c'], 2) . '&nbsp;&nbsp;</td>';
                        $Pricing_list_row .= '</tr>';

                        $subTotal += ($get_acc__row['quantity'] * $get_acc__row['price_c']);
                        $discount += ($get_acc__row['quantity'] * $discountPrice);
                        $discountedPrice += ($get_acc__row['quantity'] * $dis_total);
                        $TaxPrice += ($dis_tax_total);
                         $service_tax = $get_acc__row['service_tax_c'];
                        $service_tax = str_replace('%', '', $service_tax);
                    } else {
                        $getProd = "SELECT name,item_code_c FROM quote_products,quote_products_cstm WHERE id = '$prod_id' AND id=id_c AND deleted =0";
                        $getProd_res = $db->query($getProd);
                        $getProd_row = $db->fetchByAssoc($getProd_res);

                        $new_spec_val = $get_acc__row['product_specification_c'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);
                        // $amount = $get_acc__row['quantity']*$get_acc__row['price_c'];
                        //              $gst_value = $amount - $get_acc__row['discount_c']/100;
                        // $total_tax = $gst_value * $get_acc__row['service_tax_c']/100;
                        $discountPrice = $get_acc__row['discount_c'];
                        if ($get_acc__row['discount_c'] < 50) {
                            $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                        } else {
                            if (intval($get_acc__row1['dis_check']) == 1) {
                                $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                            }
                        }
                        $dis_total = ($get_acc__row['price_c'] - $discountPrice);
                        $distotal = $dis_total + $get_acc__row['other_charges_c'];
                        $dis_tax_total = $distotal * ($get_acc__row['service_tax_c'] / 100);
                        $total = $dis_total + $dis_tax_total;
                        $Pricing_list_row2 = '<tr>';
                        $Pricing_list_row2 .= '<td width="20%"> </td>';
                        $Pricing_list_row2 .= '<td width="50%">' . $getProd_row['item_code_c'] . '</td>';
                        $Pricing_list_row2 .= '<td width="120%">' . $getProd_row['name'] . "<br/>" . $new_spec_val . "</td>";
                        $Pricing_list_row2 .= '<td width="40%">' . $get_acc__row['code_c'] . '</td>';
                        $Pricing_list_row2 .= '<td width="40%">' . (float)$get_acc__row['quantity'] . '</td>';
                        $Pricing_list_row2 .= '<td width="50%">' . $get_acc__row['uom_c'] . '</td>';
                        $Pricing_list_row2 .= '<td width="50%">'.$currency_name.'' . number_format($get_acc__row['price_c'], 2) . '</td>';
                        //$Pricing_list_row2 .= '<td width="40%">' . $get_acc__row['other_charges_c'] . '</td>';
                        $Pricing_list_row2 .= '<td width="30%">' . $get_acc__row['service_tax_c'] . '</td>';
                        $Pricing_list_row2 .= '<td width="40%">' . number_format($get_acc__row['quantity'] * $dis_tax_total, 2) . '</td>';
                        $Pricing_list_row2 .= '<td width="60%">'.$currency_name.'' . number_format(($get_acc__row['quantity'] * $total) + $get_acc__row['shipping_c'], 2) . '&nbsp;&nbsp;</td>';
                        $Pricing_list_row2 .= '</tr>';


                        //$Pricing_list_row .='<td width="50%">'.number_format($get_acc__row['quantity']*$discountPrice,2).'&nbsp;&nbsp;</td>';
                        // $dis_total = ($get_acc__row['price_c'] - $discountPrice);
                        // $dis_tax_total = $dis_total *($get_acc__row['service_tax_c']/100);
                        // $total = $dis_total+$dis_tax_total;
                        // $service_tax = $get_acc__row['service_tax_c'];
                        // $service_tax_val = $get_acc__row['service_tax_c'];

                        $subTotal += ($get_acc__row['quantity'] * $get_acc__row['price_c']);
                        $discount += ($get_acc__row['quantity'] * $discountPrice);
                        $discountedPrice += ($get_acc__row['quantity'] * $dis_total);
                        $TaxPrice += ($get_acc__row['quantity'] * $dis_tax_total);
                        //$shipping = $get_acc__row['other_charges_c'];
                    }
                    $gst_array[] = $service_tax;
                }
                //print_r($structure_details);
                 $highest_tax = max($gst_array);
                $shipping = $structure_details * ($highest_tax / 100);//exit;
                //$structure_details = $this->bean->structure_details_c;
                $Pricing_list_row .= $Pricing_list_row3;

                $Pricing_list_row .= $Pricing_list_row2;
                $productCount++;
                $TaxPrice = $TaxPrice +$shipping;
                $Total = $discountedPrice + $TaxPrice + $structure_details;
				
				//code written by pratik on 19082019 start (kerala 1% cess)
				$other_charges_per = 0;
				if($discountedPrice!=0)
					{
	                    $cess1 = (1 / 100) * $discountedPrice;
						if($structure_details!=0)
						{
							$other_charges_per = (1 / 100) * $structure_details;
						}
						$_finale_cess_1 = $cess1 + $other_charges_per;
						
					}
					else if($subTotal!=0)
					{
						$cess1 = (1 / 100) * $subTotal;
						if($structure_details!=0)
						{
							$other_charges_per = (1 / 100) * $structure_details;
						}
						$_finale_cess_1 = $cess1 + $other_charges_per;
						
					}
				//code written by pratik on 19082019 end (kerala 1% cess)
                if ($discount == '0.00') {
                    // 	$packing_charges = $qObj->packing_charges_c;
                    // $freight_charges  = $qObj->freight_charges_c;
                    // $loading_charges = $qObj->loading_unloading_charges_c;
                    // $other_charges = $qObj->other_charges_c;
                    $Pricing_list_row .= '
			<hr /><tr>
				<td><b>Details of Other Charges</b></td>
				<td colspan="3" align="right">Subtotal:</td>
				<td align="right">'.$currency_name.'' . number_format($subTotal, 2) . '</td>
			</tr>
			<tr>
				<td align="left">Packing Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($packing_charges, 2) . '</td>
				<td colspan="2" align="right">Other Charges:</td>
				<td align="right">'.$currency_name.'' . number_format($structure_details, 2) . '</td>
			</tr>
			<tr>
				<td align="left">Freight Charges :</td>
				<td align="left">'.$currency_name.'' . number_format($freight_charges, 2) . '</td>
				<td colspan="2" align="right">GST:</td>
				<td align="right">'.$currency_name.'' . number_format($TaxPrice, 2) . '</td>
			</tr>	
			<tr>
				<td align="left">Loading & unloading Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($loading_charges, 2) . '</td>';
				
				//code written by pratik on 19082019 start (kerala 1% cess)
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row .= '<td colspan="2" align="right"> kerala Cess 1% :</td>';
					$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($_finale_cess_1, 2) . '</td>';
					
				}else{
					$Pricing_list_row .= '<td colspan="2" align="right">&nbsp;</td>';
					$Pricing_list_row .= '<td align="right">&nbsp;</td>';
					
				}
				//code written by pratik on 19082019 end (kerala 1% cess)
				
			$Pricing_list_row .= '</tr>
			<tr>
				<td align="left"> Other Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($other_charges, 2) . ' </td>
				<td colspan="2" align="right">Total:</td>';
				
				//code written by pratik on 19082019 start (kerala 1% cess)
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($Total + $_finale_cess_1, 2) . '</td>';
					
				}else{ 
				$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($Total, 2) . '</td>';
				}
				//code written by pratik on 19082019 end (kerala 1% cess)
				
			$Pricing_list_row .= '</tr>
			<hr />';
                } else {
                    $Pricing_list_row .= '
			<hr /><tr>
				<td><b>Details of Other Charges</b></td>
				<td colspan="3" align="right">Subtotal:</td>
				<td align="right">'.$currency_name.'' . number_format($subTotal, 2) . '</td>
			</tr>
			<tr>
				<td align="left">Packing Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($packing_charges, 2) . '</td>
				<td colspan="2" align="right">Discount:</td>
				<td align="right">'.$currency_name.'' . number_format($discount, 2) . '</td>
			</tr>

			<tr>
				<td align="left">Freight Charges :</td>
				<td align="left">'.$currency_name.'' . number_format($freight_charges, 2) . '</td>
				<td colspan="2" align="right">Discounted Total:</td>
				<td align="right">'.$currency_name.'' . number_format($discountedPrice, 2) . '</td>
			</tr>
			<tr>
				<td align="left">Loading & unloading Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($loading_charges, 2) . '</td>
				<td colspan="2" align="right">Other Charges:</td>
				<td align="right">'.$currency_name.'' . number_format($structure_details, 2) . '</td>
			</tr>
			<tr>
				<td align="left"> Other Charges: </td>
				<td align="left">'.$currency_name.'' . number_format($other_charges, 2) . ' </td>
				<td colspan="2" align="right">GST:</td>
				<td align="right">'.$currency_name.'' . number_format($TaxPrice, 2) . '</td>';
				
			$Pricing_list_row .= '</tr>';
			
			
				//code written by pratik on 19082019 start (kerala 1% cess)
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row .= '<tr><td align="left">&nbsp;</td>';
					$Pricing_list_row .= '<td align="left">&nbsp;</td>';
					$Pricing_list_row .= '<td colspan="2" align="right"> kerala Cess 1% :</td>';
					$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($_finale_cess_1, 2) . '</td></tr>';
					
				}
			
				$Pricing_list_row .= '<tr>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td colspan="2" align="right">Total:</td>';
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($Total + $_finale_cess_1, 2) . '</td>';
					
				}else{ 
					$Pricing_list_row .= '<td align="right">'.$currency_name.'' . number_format($Total, 2) . '</td>';
				}
			//code written by pratik on 19082019 end (kerala 1% cess)
			
			$Pricing_list_row .= '</tr><hr />';
                }
            } else if ($get_group_type_row['group_type_c'] == 'Installation' && $installationCount == 0) {

                //~ $get_acc_details1="SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Installation' order by group_id_c";
                $get_acc_details1 = "SELECT *,SUBSTRING(group_id_c,1,1) as GroupID1,SUBSTRING(group_id_c,3,2) as GroupID2 FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Installation' order by GroupID1,abs(GroupID2)";
                $get_acc_details_res1 = $db->query($get_acc_details1);

                $Pricing_list_row1 .= '<tr><td><b>Installation</b></td></tr>';
                $Pricing_list_row1 .= '<tr>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="20%"><b>S. #</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="50%"><b>Item Code</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="120%"><b> Product</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> SAC CODE</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> Quantity</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="30%"><b> UOM</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="50%"><b> Unit Price</b></td>';
                //$Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> Other Charges</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="30%"><b> GST %</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="40%"><b> GST Value</b></td>';
                $Pricing_list_row1 .= '<td bgcolor="#4B4B4B" style="color:#fff" width="60%"><b> Price</b></td>';
                $Pricing_list_row1 .= '</tr>';
                $installSrNo = 0;
                $subTotal = 0;
                $discount = 0;
                $discountedPrice = 0;
                $TaxPrice = 0;
                while ($get_acc__row1 = $db->fetchByAssoc($get_acc_details_res1)) {

                    $prod_id = $get_acc__row1['product_id'];
                    $getProd = "SELECT name,item_code_c FROM quote_products,quote_products_cstm WHERE id = '$prod_id' AND id=id_c AND deleted =0";
                    $getProd_res = $db->query($getProd);
                    $getProd_row = $db->fetchByAssoc($getProd_res);

                    $new_spec_val1 = $get_acc__row1['product_specification_c'];
                    $new_spec_val1 = str_replace("\n", " ", $new_spec_val1);
                    $new_spec_val1 = str_replace("\r", "", $new_spec_val1);
                    $discountPrice = $get_acc__row1['discount_c'];
                    if ($get_acc__row1['discount_c'] <= 50) {
                        $discountPrice = $get_acc__row1['price_c'] * ($get_acc__row1['discount_c'] / 100);
                    } else {
                        if (intval($get_acc__row1['dis_check']) == 1) {
                            $discountPrice = $get_acc__row1['price_c'] * ($get_acc__row1['discount_c'] / 100);
                        }
                    }
                    $dis_total = ($get_acc__row1['price_c'] - $discountPrice);
                    $distotal = $dis_total + $get_acc__row1['other_charges_c'];
                    $dis_tax_total = $distotal * ($get_acc__row1['service_tax_c'] / 100);
                    $total = $dis_total + $dis_tax_total;
                    $Pricing_list_row1 .= '<tr>';
                    $Pricing_list_row1 .= '<td width="20%">' . ++$installSrNo . '</td>';
                    $Pricing_list_row1 .= '<td width="50%">' . $getProd_row['item_code_c'] . '</td>';
                    $Pricing_list_row1 .= '<td width="120%">' . $getProd_row['name'] . "<br/>" . $new_spec_val1 . "</td>";
                    $Pricing_list_row1 .= '<td width="40%">' . $get_acc__row1['code_c'] . '</td>';
                    $Pricing_list_row1 .= '<td width="40%">' . (float)$get_acc__row1['quantity'] . '</td>';
                    $Pricing_list_row1 .= '<td width="30%">' . $get_acc__row1['uom_c'] . '</td>';
                    $Pricing_list_row1 .= '<td width="50%">' . number_format($get_acc__row1['price_c'], 2) . '</td>';
                    //$Pricing_list_row1 .= '<td width="40%">' . number_format($get_acc__row1['other_charges_c'], 2) . '</td>';

                    $Pricing_list_row1 .= '<td width="30%">' . $get_acc__row1['service_tax_c'] . '</td>';
                    $Pricing_list_row1 .= '<td width="40%">' . number_format($get_acc__row1['quantity'] * $dis_tax_total, 2) . '</td>';
                    $Pricing_list_row1 .= '<td width="60%">'.$currency_name.'' . number_format($get_acc__row1['quantity'] * $get_acc__row1['price_c'], 2) . '&nbsp;&nbsp;</td>';
                    $Pricing_list_row1 .= '</tr><br/>';


                    //$Pricing_list_row1 .='<td width="50%">'.number_format($get_acc__row1['quantity']*$discountPrice,2).'&nbsp;&nbsp;</td>';
                    //$dis_total = ($get_acc__row1['price_c'] - $discountPrice);
                    // $distotal = $dis_total + $get_acc__row1['other_charges_c'];
                    // $dis_tax_total = $distotal *($get_acc__row1['service_tax_c']/100);
                    // $total = $dis_total+$dis_tax_total;
                    // $dis_total = ($get_acc__row1['price_c'] - $discountPrice);
                    //  $dis_tax_total = $dis_total *($get_acc__row1['service_tax_c']/100);
                    // $service_tax = $get_acc__row1['service_tax_c'];
                    // $service_tax_val = $get_acc__row1['service_tax_c'];

                    $subTotal += ($get_acc__row1['quantity'] * $get_acc__row1['price_c']);
                    $discount += ($get_acc__row1['quantity'] * $discountPrice);
                    $discountedPrice += ($get_acc__row1['quantity'] * $dis_total);
                    $TaxPrice += ($get_acc__row1['quantity'] * $dis_tax_total);
                }
                $installationCount++;
                $Total = $discountedPrice + $TaxPrice;
				
				//code written by pratik on 19082019 start (kerala 1% cess)
				if($discountedPrice!=0)
				{
	                    $_finale_cess_2 = (1 / 100) * $discountedPrice;
						
				}
				else if($subTotal!=0)
				{
						$_finale_cess_2 = (1 / 100) * $subTotal;
						
				}
				//code written by pratik on 19082019 end (kerala 1% cess)
				
                if ($discount == '0.00') {
                    $Pricing_list_row1 .= '
			<hr />
			<tr>
				<td colspan="4" align="right">Subtotal:</td>
				<td align="right">'.$currency_name.'' . number_format($subTotal, 2) . '</td>	
			</tr>
			<tr>
				<td colspan="4" align="right">GST:</td>
				<td align="right">'.$currency_name.'' . number_format($TaxPrice, 2) . '</td>
			</tr>';
			
			//code written by pratik on 19082019 start (kerala 1% cess)
			if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row1 .= '<tr>';
					$Pricing_list_row1 .= '<td colspan="4" align="right">kerala Cess 1% :</td>';
					$Pricing_list_row1 .= '<td align="right">'.$currency_name.'' . number_format($_finale_cess_2, 2) . '</td>';
					$Pricing_list_row1 .= '</tr>';
					
				}
				$Pricing_list_row1 .= '<tr><td colspan="4" align="right">Total:</td>';
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row1 .='<td align="right">'.$currency_name.'' . number_format($Total + $_finale_cess_2, 2) . '</td>';
				}else{
					$Pricing_list_row1 .='<td align="right">'.$currency_name.'' . number_format($Total, 2) . '</td>';
				}
			//code written by pratik on 19082019 end (kerala 1% cess)
			
			$Pricing_list_row1 .='</tr><hr />';
                } else {
                    $Pricing_list_row1 .= '
			<hr /><tr>
				<td colspan="4" align="right">Subtotal:</td>
				<td align="right">'.$currency_name.'' . number_format($subTotal, 2) . '</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Discount:</td>
				<td align="right">'.$currency_name.'' . number_format($discount, 2) . '</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Discounted Total:</td>
				<td align="right">'.$currency_name.'' . number_format($discountedPrice, 2) . '</td>
				<td colspan="4" align="right">GST:</td>
				<td align="right">'.$currency_name.'' . number_format($TaxPrice, 2) . '</td>
			</tr>';
			//code written by pratik on 19082019 start (kerala 1% cess)
			if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row1 .= '<tr>
					<td colspan="4" align="right">kerala Cess 1% :</td>';
					$Pricing_list_row1 .= '<td align="right">'.$currency_name.'' . number_format($_finale_cess_2, 2) . '</td></tr>';
					
				}
				
			$Pricing_list_row1 .= '<tr>
				<td colspan="4" align="right">Total:</td>';
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row1 .='<td align="right">'.$currency_name.'' . number_format($Total + $_finale_cess_2, 2) . '</td>';
				}else{
					$Pricing_list_row1 .='<td align="right">'.$currency_name.'' . number_format($Total, 2) . '</td>';
				}
				//code written by pratik on 19082019 end (kerala 1% cess)
				
			$Pricing_list_row1 .='</tr><hr />';
                }
            }
        }

        // create new PDF document
        $pdf = new QuotePdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hatim Alam');
        $pdf->SetTitle('Quote PDF');
        $pdf->SetSubject('Quote');
        $pdf->SetKeywords('TCPDF, PDF, quote, custom quote');
        $pdf->SetFont('helvetica', '', 8, '', true);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, 15, '', '');

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetFooterMargin(10);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		 //code written by pratik on 08082019 Start (kerala 1% cess)
		 if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
		{
			 $cess_amount_kerala .= '<tr>';
			 $cess_amount_kerala .= '<td colspan="4" align="right">kerala Cess 1% :</td>';
			 $cess_amount_kerala .= '<td align="right">'.$currency_name.'' . $cess_amt_kerala. '</td>';
			 $cess_amount_kerala .= '</tr>';
		}else{
			    $cess_amount_kerala ='';
				
		}
		 //code written by pratik on 08082019 End (kerala 1% cess)
		 
        // Add a page
        $pdf->AddPage();
        if ($discountAmt == '0.00') {
            $tbl = <<<EOD
		<h3 align="center" ><b>$quote_header</b></h3><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>Bill To</b></td>
				<td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>Ship To</b></td>
				<td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>$pdf_type</b></td>
			</tr>
		  <tr>
			<td style="width:100%;"><br />$acc_lead_details<br /></td>
			<td style="width:100%;"><br />$acc_lead_details1<br /></td>
			<td style="width:100%;">
			  <table border="0" cellpadding="0"  cellspacing="0" style="border-collapse:collapse;">
				<tr><td></td><td></td></tr>
				<tr><td style="width:70%;">$pdf_type Number:</td><td style="width:150%;">$quote_quote_number</td></tr>
				<tr><td style="width:70%;">Date:</td><td style="width:150%;">$current_date</td></tr>
				<tr><td style="width:70%;">Sales Person:</td><td style="width:150%;">$sale_person</td></tr>
				<tr><td style="width:70%;">Valid Until:</td><td style="width:150%;">$valid_until</td></tr>
				<tr><td style="width:70%;">Email:</td><td style="width:150%;">$sale_person_email</td></tr>
				<tr><td style="width:70%;">Mobile:</td><td style="width:150%;">$sale_person_mobile</td></tr>
                <tr><td style="width:70%;">Quote Stage:</td><td style="width:150%;">$quote_stage</td></tr>

			  </table>
			</td>
		  </tr>
		 </table> <br/><hr/>
		 <table width="100%" cellspacing="2" cellpadding="10">
			<tr>
				<td bgcolor="#fff" style="color:#fff" width="40%"><b>Quantity</b></td>
				<td bgcolor="#fff" style="color:#fff" width="150%"><b>Product</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Amount</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Discount</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Discounted Price</b></td>
			</tr>
			$Pricing_list_row
			$Pricing_list_row1
		</table>
		<br/>
		<table width="100%" align="left" cellspacing="3" cellpadding="10">
			<tr>
			<td colspan="4" align="right"><b>Grand Total</b></td>
			<td  align="right">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Subtotal:</td>
				<td  align="right">$currency_name $subtotal</td>
			</tr>
            <tr>
				<td colspan="4" align="right">Other Charges:</td>
				<td align="right">$currency_name $shipping_amt</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Total GST:</td>
				<td align="right">$currency_name $totaltax</td>
			</tr>
			$cess_amount_kerala
			<tr>
				<td colspan="4" align="right">Grand Total:</td>
				<td align="right">$currency_name $grand_total</td>
			</tr>
		</table>

EOD;
        } else {
            $tbl = <<<EOD
		<h3 align="center" ><b>$quote_header</b></h3><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>Bill To</b></td>
				<td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>Ship To</b></td>
				<td bgcolor="#4B4B4B" style="color:#fff" width="100%"><b>$pdf_type</b></td>
			</tr>
		  <tr>
			<td style="width:100%;"><br />$acc_lead_details<br /></td>
			<td style="width:100%;"><br />$acc_lead_details1<br /></td>
			<td style="width:100%;">
			  <table border="0" cellpadding="0"  cellspacing="0" style="border-collapse:collapse;">
				<tr><td></td><td></td></tr>
				<tr><td style="width:70%;">$pdf_type Number:</td><td style="width:150%;">$quote_quote_number</td></tr>
				<tr><td style="width:70%;">Date:</td><td style="width:150%;">$current_date</td></tr>
				<tr><td style="width:70%;">Sales Person:</td><td style="width:150%;">$sale_person</td></tr>
				<tr><td style="width:70%;">Valid Until:</td><td style="width:150%;">$valid_until</td></tr>
				<tr><td style="width:70%;">Email:</td><td style="width:150%;">$sale_person_email</td></tr>
				<tr><td style="width:70%;">Mobile:</td><td style="width:150%;">$sale_person_mobile</td></tr>
                 <tr><td style="width:70%;">Quote Stage:</td><td style="width:150%;">$quote_stage</td></tr>
			  </table>
			</td>
		  </tr>
		 </table> <br/><hr/>
		 <table width="100%" cellspacing="2" cellpadding="10">
			<tr>
				<td bgcolor="#fff" style="color:#fff" width="40%"><b>Quantity</b></td>
				<td bgcolor="#fff" style="color:#fff" width="150%"><b>Product</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Amount</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Discount</b></td>
				<td bgcolor="#fff" style="color:#fff" width="70%"><b>Discounted Price</b></td>
			</tr>
			$Pricing_list_row
			$Pricing_list_row1
		</table>
		<br/>
		<table width="100%" align="left" cellspacing="3" cellpadding="10">
			<tr>
			<td colspan="4" align="right"><b>Grand Total</b></td>
			<td  align="right">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Subtotal:</td>
				<td  align="right">$currency_name $subtotal</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Discount:</td>
				<td align="right">$currency_name $discountAmt</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Discounted Total:</td>
				<td align="right">$currency_name $total_discount</td>
			</tr>
             <tr>
				<td colspan="4" align="right">Other Charges:</td>
				<td align="right">$currency_name $shipping_amt</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Total GST:</td>
				<td align="right">$currency_name $totaltax</td>
			</tr>
			$cess_amount_kerala
			<tr>
				<td colspan="4" align="right">Grand Total:</td>
				<td align="right">$currency_name $grand_total</td>
			</tr>
		</table>

EOD;
        }
        $tbl1 = <<<EOD

		<hr/><br/>
		<table border="0" cellpadding="2" cellspacing="50" width="100%" align="justify">
			<tr>
			<!--<td style="padding-left:10px">$certify</td>
			<td style="padding-left:10px">$decleration</td>-->
			<td style="padding-left:10px">$company_vat_details_v<br/>$company_vat_details_cs<br/>$company_vat_details_pf<br/>$company_vat_details_es <br/></td>
			</tr>
			<br/><hr/><br/>
		</table>

EOD;
        $terms_conditions = str_replace("\n", "<br/>&nbsp;", $terms_conditions);
        $terms .= <<<EOD
		<br />
		<div align="center"><B>Terms & Conditions</B></div><br/>
		<table width="100%" align="justify">
			<tr><td>$terms_conditions</td></tr>

		</table>

EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');
        $y = $pdf->getY();
        if ($y >= 265) {
            $pdf->AddPage();
        }
        $pdf->writeHTML($tbl1, true, false, false, false, '');
        //$pdf->AddPage();
        $pdf->writeHTML($terms, true, false, false, false, '');

        ob_clean();

        $pdf->AddPage();
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
        $pdf->setPrintHeader(false);
        //~ $image1 = K_PATH_IMAGES.'0001.jpg';
		//var/www/html/squarefoot/prodbackup/include/tcpdf/images/quotation1aa.jpg(image path) - pratik
        $image1 = K_PATH_IMAGES . 'quotation1.jpg';
        $pdf->Image($image1, 0, 0, 210, 298, '', '', '', false, 300, 'C', false, false, 0, '', false, true);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
        $image2 = K_PATH_IMAGES . 'quotation2.jpg';
        $pdf->Image($image2, 0, 0, 210, 298, '', '', '', false, 300, 'C', false, false, 0, '', false, true);

        $pdf->AddPage();
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
        $image3 = K_PATH_IMAGES . 'quotation3.jpg';
        $pdf->Image($image3, 0, 0, 210, 298, '', '', '', false, 300, 'C', false, false, 0, '', false, true);

        $pdf_action = ($action == 'email') ? 'F' : 'D';
        $pdf->Output($this->file_name . '_.pdf', $pdf_action);
    }

    private function getMyBean($module_name, $rec_id = null, $class_name = null) {
        $class_name = ($class_name != null) ? $class_name : $module_name;
        require_once('modules/' . $module_name . '/' . $class_name . '.php');
        $bean_obj = new $class_name();
        $bean_obj->retrieve($rec_id);
        return $bean_obj;
    }

    public function retFileName() {
        return $this->file_name;
    }

    public function retEmailId() {
        return $this->email_id;
    }

    // Page footer
    public function Footer() {
        $db = DBManagerFactory::getInstance();
        $quote_id = $_REQUEST['record'];
        $qObj = $this->getMyBean('quote_Quote', $quote_id);
        $branch = $qObj->branch_c;
        $query = $db->query("SELECT * FROM pdf_quote_pdf as pdf
										JOIN pdf_quote_pdf_cstm AS pdf_c ON
										(pdf.id=pdf_c.id_c)
										WHERE pdf.branch='$branch'
										AND pdf.deleted=0 LIMIT 0,1");
        $query_result = $db->fetchByAssoc($query);
        $addressBranch = "Address:" . $query_result['address_1_c'];
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'B', 6);
        // Page number
        //$this->Cell(0, 10, $this->footer_text, 'T', 0, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, $addressBranch, 'T', 0, 'L', 0, '', 0, false, 'T', 'M');
    }

    public function Header() {
        //parent::Header();
        $image_file = K_PATH_IMAGES . 'tcpdf_logo.jpg';
        $this->Image($image_file, 10, 10, 20, 12, 'JPG', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
    }

}

?>

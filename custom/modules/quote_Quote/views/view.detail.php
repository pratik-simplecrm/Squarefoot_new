<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class quote_QuoteViewDetail extends ViewDetail {

    function quote_QuoteViewDetail() {
        parent::ViewDetail();
    }

    function display() {
        $beanDateEntered = $this->bean->date_entered;
        $beanDateModified = $this->bean->date_modified;
        global $db;
        global $current_user;
        $current_user_id = $current_user->id;
        $module = 'quote_Quote';
        $current_user_role4='';
        require_once("modules/ACLRoles/ACLRole.php");
        $acl_role_obj = new ACLRole();
        $user_roles = $acl_role_obj->getUserRoles($current_user_id);
        $current_user_role = $user_roles[0];
        if($current_user_role=='Sales coordinator for malathi user')
        {
            $current_user_role4 = str_replace(" ","_",$current_user_role);
        }

        if (!empty($current_user_role)) {
            $query_discount_approval = "SELECT approval_levels_c from scrm_discount_approval_matrix_cstm JOIN scrm_discount_approval_matrix ON id_c=id where role1_c='$current_user_role' OR role2_c='$current_user_role' OR role3_c='$current_user_role' OR role4_c='$current_user_role4' and deleted=0";
            $result = $db->query($query_discount_approval);
            $row = $db->fetchByAssoc($result);
            $approval_level = $row['approval_levels_c'];
            $Approved = explode('^', $approval_level);
            //print_r($Approved);
           
            if (!empty($Approved)) {

                $js = <<<EOD
			<script>
				$(document).ready(function(){
					var approval_status = $('#approval_status_c').val();
					//alert(approval_status);
                    //var role_name = '$current_user_role';
                    
                    //written by: Anjali Ledade //to hide customer type dropdown
                    $(this).find('#customer_type_c').hide();

                    //$("#customer_type_c").hide();
                    
                    var branch = $("#branch_c").val();
                    if($("#branch_c").val() != 'Kerala'){
                        
                        $('#customer_type_c').parent().parent().hide();
                    }                    

					if(approval_status == 'Approved')
					{
						$('#print_pdf').show();
						$('#email_pdf').show();
						$('#email_quote').show();

					}
					else
					{
						$('#print_pdf').hide();
						$('#email_pdf').hide();
						$('#email_quote').hide();
					}
		});
		</script>
EOD;
                echo $js;
            }
        }
        echo $jbBean = <<<BEA
		<script>
		$(document).ready(function(){
			var dateEnter = $('#date_entered').text();
			$('#date_entered').text('$beanDateEntered');

			var dateModified = $('#date_modified').text();
			$('#date_modified').text('$beanDateModified');
		});
		</script>
BEA;
        global $db;
        //assign the values to be displayed in detail view
        $this->ss->assign("sub", $this->bean->sub_total);
        $this->ss->assign("tot_dis", $this->bean->discount);
        $this->ss->assign("new_sub", $this->bean->new_subtotal);
        $this->ss->assign("tax", $this->bean->total_tax);
        $this->ss->assign("total", $this->bean->grand_total);

        $productCount = 0;
        $installationCount = 0;
        $otherCount = 0;

        $shipProductCount = 0;
        $shipInstallationCount = 0;

        $quote_id = $this->bean->id;
        $bean1 = BeanFactory::getBean('quote_QuoteProducts');
        $qp_list = $bean1->get_list("", "quote_quoteproducts.quote_id = '" . $quote_id . "'");

         
        /* get currency code starts added on 30 jan 2020 by pratik */
        $get_currency_id = "SELECT `currency_id` FROM `quote_quote` WHERE `id`='$quote_id'";
        $get_currency_id_res = $db->query($get_currency_id);
        $get_currency_id_row = $db->fetchByAssoc($get_currency_id_res);
        $currency_id = $get_currency_id_row['currency_id'];

        $get_currency = "SELECT `symbol` FROM `currencies` WHERE `id`='$currency_id'";
        $get_currency_res = $db->query($get_currency);
        $get_currency_row = $db->fetchByAssoc($get_currency_res);
        $currency_code = $get_currency_row['symbol']." ";
        if(empty($currency_name) && $currency_id=='-99')
        {
           $currency_code = 'Rs. ';
        }
       // echo "currency_name:". $currency_name;
        /* get currency code end */

        $i = 0;
        $prods = array();
        //echo "<pre>";
        //print_r($qp_list['list']);
        foreach ($qp_list['list'] as $list) {
            $prods[$i]['name'] = $list->name;
            $prods[$i]['price'] = $list->price;
            $prods[$i]['tax'] = $this->retrieve($list->tax);
            $prods[$i]['disc'] = $list->discount;
            $prods[$i]['dis_check'] = $list->dis_check;
            $prods[$i]['qty'] = $list->quantity;
            $prods[$i]['prod_id'] = $list->product_id;
            $prods[$i]['group_id_c'] = $list->group_id_c;
            $prods[$i]['group_type_c'] = $list->product_id;
            $prods[$i]['service_tax_val_c'] = $list->product_id;
            $i++;
        }


        $get_group_type1 = "SELECT group_type_c FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 ORDER BY group_type_c";
        $get_group_type_res1 = $db->query($get_group_type1);
        while ($get_group_type_row1 = $db->fetchByAssoc($get_group_type_res1)) {
            if ($get_group_type_row1['group_type_c'] == 'Product' && $shipProductCount == 0) {
                $shipProductCount++;
            } else if ($get_group_type_row1['group_type_c'] == 'Installation' && $shipInstallationCount == 0) {
                $shipInstallationCount++;
            }
        }


        /*
          foreach($prods as $prod) {
          $qp_inline .= "addRow('".$prod['qty']."','".$prod['name']."','".$prod['price']."','".$prod['tax']."','".$prod['disc']."','".$prod['dis_check']."');";
          }
         */
        $get_group_type = "SELECT group_type_c FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 ORDER BY group_type_c";
        $get_group_type_res = $db->query($get_group_type);
		
		//code written by pratik on 07082019 start (Kerala 1% cess code)
		$get_barnch_unuser = "SELECT `branch_c`,`unregistered_user_c` FROM `quote_quote_cstm` WHERE `id_c`='$quote_id'";
		$get_barnch_unuser_res = $db->query($get_barnch_unuser);
		$get_barnch_unuser_row = $db->fetchByAssoc($get_barnch_unuser_res);
		$branch_nm = trim($get_barnch_unuser_row['branch_c']);
		$unregistered_user = trim($get_barnch_unuser_row['unregistered_user_c']);
		//code written by pratik on 07082019 end (Kerala 1% cess code)
		
        while ($get_group_type_row = $db->fetchByAssoc($get_group_type_res)) {
			
            if ($get_group_type_row['group_type_c'] == 'Product' && $productCount == 0) {

                //~ $get_acc_details="SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Product' order by group_id_c";
                $get_acc_details = "SELECT *,SUBSTRING(group_id_c,1,1) as GroupID1,SUBSTRING(group_id_c,3,2) as GroupID2 FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Product' order by GroupID1,abs(GroupID2)";
                $get_acc_details_res = $db->query($get_acc_details);


                $Pricing_list_row .= "<tr>";
                $Pricing_list_row .= "<td colspan =8><strong> Group Name : Product</strong></td>";
                $Pricing_list_row .= "</tr>";
                $Pricing_list_row .= "<tr>";
                $Pricing_list_row .= "<td><strong> Quantity:</strong></td>";
                $Pricing_list_row .= "<td><strong> Product:</strong></td>";
                $Pricing_list_row .= "<td><strong> HSN CODE:</strong></td>";
                $Pricing_list_row .= "<td><strong> UOM:</strong></td>";
                $Pricing_list_row .= "<td><strong> Amount:</strong></td>";
                $Pricing_list_row .= "<td><strong> Tax Class:</strong></td>";
                $Pricing_list_row .= "<td><strong> Discount:</strong></td>";
                $Pricing_list_row .= "<td><strong> GST%:</strong></td>";
                $Pricing_list_row .= "<td><strong> GST Value:</strong></td>";
                $Pricing_list_row .= "<td><strong> Total:</strong></td>";
                $Pricing_list_row .= "</tr>";

                $subTotal = 0;
                $discount = 0;
                $discountedPrice = 0;
                $TaxPrice = 0;
                $gst_array = array();
                while ($get_acc__row = $db->fetchByAssoc($get_acc_details_res)) {

                    $prod_id = $get_acc__row['product_id'];
                    $GLOBALS['log']->fatal($prod_id, "Delivery charges");
                    $prod_name = $get_acc__row['name'];
                    if ($prod_name != 'Delivery charges') {
                        $getProd = "SELECT name FROM quote_products WHERE id = '$prod_id' AND deleted =0";
                        $getProd_res = $db->query($getProd);
                        $getProd_row = $db->fetchByAssoc($getProd_res);

                        $new_spec_val = $get_acc__row['product_specification_c'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);

                        $Pricing_list_row .= "<tr>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['quantity'] . "</td>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['name'] . "<br/>" . $new_spec_val . "</td>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['code_c'] . "</td>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['uom_c'] . "</td>";
                        $Pricing_list_row .= "<td>" . number_format($get_acc__row['quantity'] * $get_acc__row['price_c'], 2) . "</td>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['tax'] . "</td>";
                        $discountPrice = $get_acc__row['discount_c'];

                        if ($get_acc__row['discount_c'] < 50) {
                            $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                        } else {
                            if (intval($get_acc__row['dis_check']) == 1) {
                                $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                            }
                        }
                        $Pricing_list_row .= "<td>" . number_format($get_acc__row['quantity'] * $discountPrice, 2) . "</td>";
                        $Pricing_list_row .= "<td>" . $get_acc__row['service_tax_c'] . "</td>";
                        $amount = $get_acc__row['quantity'] * $get_acc__row['price_c'];
                        $dis_total = ($get_acc__row['price_c'] - $discountPrice);
                        $dis_tax_total = $dis_total * ($get_acc__row['service_tax_c'] / 100);
                        $total = $dis_total + $dis_tax_total;

                        $Pricing_list_row .= "<td>" . number_format($get_acc__row['quantity'] * $dis_tax_total, 2) . "</td>";
                        $Pricing_list_row .= "<td>" . number_format(($get_acc__row['quantity']*$get_acc__row['price_c']), 2) . "</td>";
                        $Pricing_list_row .= "</tr>";

                        $service_tax = $get_acc__row['service_tax_c'];
                        $service_tax = str_replace('%', '', $service_tax);
                        $service_tax_val = $get_acc__row['service_tax_val_c'];

                        $subTotal += ($get_acc__row['quantity'] * $get_acc__row['price_c']);
                        $discount += ($get_acc__row['quantity'] * $discountPrice);
                        $discountedPrice += ($get_acc__row['quantity'] * $dis_total);
                        $TaxPrice += ($get_acc__row['quantity'] * $dis_tax_total);
                    } else {

                        $getProd = "SELECT name FROM quote_products WHERE id = '$prod_id' AND deleted =0";
                        $getProd_res = $db->query($getProd);
                        $getProd_row = $db->fetchByAssoc($getProd_res);

                        $new_spec_val = $get_acc__row['product_specification_c'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);

                        $Pricing_list_row3 = "<tr>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['quantity'] . "</td>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['name'] . "<br/>" . $new_spec_val . "</td>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['code_c'] . "</td>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['uom_c'] . "</td>";
                        $Pricing_list_row3 .= "<td>" . number_format($get_acc__row['quantity'] * $get_acc__row['price_c'], 2) . "</td>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['tax'] . "</td>";
                        $discountPrice = $get_acc__row['discount_c'];

                        if ($get_acc__row['discount_c'] < 50) {
                            $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                        } else {
                            if (intval($get_acc__row['dis_check']) == 1) {
                                $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                            }
                        }
                        $Pricing_list_row3 .= "<td>" . number_format($get_acc__row['quantity'] * $discountPrice, 2) . "</td>";
                        $Pricing_list_row3 .= "<td>" . $get_acc__row['service_tax_c'] . "</td>";
                        $dis_total = ($get_acc__row['price_c'] - $discountPrice);
                        $dis_tax_total = $dis_total * ($get_acc__row['service_tax_c'] / 100);
                        $total = $dis_total + $dis_tax_total;

                        $Pricing_list_row3 .= "<td>" . number_format($get_acc__row['quantity'] * $dis_tax_total, 2) . "</td>";
                        $Pricing_list_row3 .= "<td>" . number_format(($get_acc__row['quantity'] * $total) + $get_acc__row['shipping_c'], 2) . "</td>";
                        $Pricing_list_row3 .= "</tr>";

                        $service_tax = $get_acc__row['service_tax_c'];
                        $service_tax_val = $get_acc__row['service_tax_val_c'];

                        $subTotal += ($get_acc__row['quantity'] * $get_acc__row['price_c']);
                        $discount += ($get_acc__row['quantity'] * $discountPrice);
                        $discountedPrice += ($get_acc__row['quantity'] * $dis_total);
                        $TaxPrice += ($get_acc__row['quantity'] * $dis_tax_total);
                    }
                    $gst_array[] = $service_tax;
                }
                    
                $highest_tax = max($gst_array);
                $structure_details = $this->bean->structure_details_c;
                $Pricing_list_row .= $Pricing_list_row3;
                $shipping = $structure_details * ($highest_tax / 100);
                $TaxPrice = $TaxPrice +$shipping;
                $productCount++;
                $Total = $discountedPrice + $TaxPrice + $structure_details;
                $Pricing_list_row .= "<tr><td colspan =8></td></tr>";
                $Pricing_list_row .= "<tr><td  colspan = 6></td><td>Sub Total:</td><td>".$currency_code." " . number_format($subTotal, 2) . "</td></tr>";
                $Pricing_list_row .= "<tr><td  colspan = 6></td><td>Discount:</td><td>".$currency_code."" . number_format($discount, 2) . "</td></tr>";
                $Pricing_list_row .= "<tr><td  colspan = 6></td><td>Discounted Total:</td><td>".$currency_code."" . number_format($discountedPrice, 2) . "</td></tr>";
                $Pricing_list_row .= "<tr><td  colspan = 6></td><td>Other Charges:</td><td>".$currency_code."" . number_format($structure_details, 2) . "</td></tr>";
				
                $Pricing_list_row .= "<tr><td  colspan = 6></td><td>GST:</td><td> ".$currency_code."" . number_format($TaxPrice, 2) . "</td></tr>";
				//code written by pratik on 07082019 start (Kerala 1% cess code)
				$other_charges_per = 0;
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					if($discountedPrice!=0)
					{
	                    $cess1 = (1 / 100) * $discountedPrice;
						if($structure_details!=0)
						{
							$other_charges_per = (1 / 100) * $structure_details;
						}
						$_finale_cess_1 = $cess1 + $other_charges_per;
						$Pricing_list_row .= "<tr><td  colspan = 6></td><td>kerala Cess 1% :</td><td> ".$currency_code."" . number_format($_finale_cess_1 , 2) . "</td></tr>";
					}
					else if($subTotal!=0)
					{
						$cess1 = (1 / 100) * $subTotal;
						if($structure_details!=0)
						{
							$other_charges_per = (1 / 100) * $structure_details;
						}
						$_finale_cess_1 = $cess1 + $other_charges_per;
						$Pricing_list_row .= "<tr><td  colspan = 6></td><td>kerala Cess 1% :</td><td> ".$currency_code."" . number_format($_finale_cess_1, 2) . "</td></tr>";
					}
				}
				//code written by pratik on 07082019 end (Kerala 1% cess code)
                if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row .= "<tr><td  colspan = 6></td><td>Total:</td><td> ".$currency_code."" . number_format($Total + $_finale_cess_1, 2) . "</td></tr>";
				}else{
					$Pricing_list_row .= "<tr><td  colspan = 6></td><td>Total:</td><td> ".$currency_code."" . number_format($Total, 2) . "</td></tr>";
				}
				//code written by pratik on 07082019 end (Kerala 1% cess code)
                $Pricing_list_row .= "<tr><td colspan =8></td></tr>";
            } else if ($get_group_type_row['group_type_c'] == 'Installation' && $installationCount == 0) {

                //~ $get_acc_details1="SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Installation' order by group_id_c";
                $get_acc_details1 = "SELECT *,SUBSTRING(group_id_c,1,1) as GroupID1,SUBSTRING(group_id_c,3,2) as GroupID2 FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = 'Installation' order by GroupID1,abs(GroupID2)";
                $get_acc_details_res1 = $db->query($get_acc_details1);

                $Pricing_list_row1 .= "<tr><td colspan =8><strong>Group Name : Installation</strong></td></tr>";
                $Pricing_list_row1 .= "<tr>";
                $Pricing_list_row1 .= "<td><strong> Quantity:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> Product:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> SAN CODE:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> UOM:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> Amount:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> Tax Class:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> Discount:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> GST%:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> GST Value:</strong></td>";
                //$Pricing_list_row1 .="<td><strong> Tax Amount:</strong></td>";
                $Pricing_list_row1 .= "<td><strong> Total:</strong></td>";
                $Pricing_list_row1 .= "</tr>";

                $subTotal = 0;
                $discount = 0;
                $discountedPrice = 0;
                $TaxPrice = 0;

                while ($get_acc__row1 = $db->fetchByAssoc($get_acc_details_res1)) {

                    $prod_id = $get_acc__row1['product_id'];
                    $getProd = "SELECT name FROM quote_products WHERE id = '$prod_id' AND deleted =0";
                    $getProd_res = $db->query($getProd);
                    $getProd_row = $db->fetchByAssoc($getProd_res);

                    $new_spec_val1 = $get_acc__row1['product_specification_c'];
                    $new_spec_val1 = str_replace("\n", " ", $new_spec_val1);
                    $new_spec_val1 = str_replace("\r", "", $new_spec_val1);

                    $Pricing_list_row1 .= "<tr>";
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['quantity'] . "</td>";
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['name'] . "<br/>" . $new_spec_val1 . "</td>";
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['code_c'] . "</td>";
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['uom_c'] . "</td>";
                    $Pricing_list_row1 .= "<td>" . number_format($get_acc__row1['quantity'] * $get_acc__row1['price_c'], 2) . "</td>";
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['tax'] . "</td>";

                    $discountPrice = $get_acc__row1['discount_c'];

                    if ($get_acc__row1['discount_c'] <= 50) {
                        $discountPrice = $get_acc__row1['price_c'] * ($get_acc__row1['discount_c'] / 100);
                    } else {
                        if (intval($get_acc__row1['dis_check']) == 1) {
                            $discountPrice = $get_acc__row1['price_c'] * ($get_acc__row1['discount_c'] / 100);
                        }
                    }
                    $Pricing_list_row1 .= "<td>" . number_format($get_acc__row1['quantity'] * $discountPrice, 2) . "</td>";
                    $dis_total = ($get_acc__row1['price_c'] - $discountPrice);
                    $dis_tax_total = $dis_total * ($get_acc__row1['service_tax_c'] / 100);
                    $total = $dis_total + $dis_tax_total;
                    $Pricing_list_row1 .= "<td>" . $get_acc__row1['service_tax_c'] . "</td>";
                    $Pricing_list_row1 .= "<td>" . number_format($get_acc__row1['quantity'] * $dis_tax_total, 2) . "</td>";
                    $Pricing_list_row1 .= "<td>" . number_format($get_acc__row1['quantity'] * $get_acc__row1['price_c'], 2) . "</td>";
                    $Pricing_list_row1 .= "</tr>";

                    $service_tax = $get_acc__row1['service_tax_c'];
                    $service_tax_val = $get_acc__row1['service_tax_val_c'];

                    $subTotal += ($get_acc__row1['quantity'] * $get_acc__row1['price_c']);
                    $discount += ($get_acc__row1['quantity'] * $discountPrice);
                    $discountedPrice += ($get_acc__row1['quantity'] * $dis_total);
                    $TaxPrice += ($get_acc__row1['quantity'] * $dis_tax_total);
                    $shipping = $get_acc__row1['shipping_c'];
                }
                $installationCount++;
                if ($shipProductCount) {
                    $shipping = $this->bean->shipping_2_c;
                } else {
                    $shipping = $this->bean->shipping_1_c;
                }
                $Total = $discountedPrice + $TaxPrice + $shipping;

                $Pricing_list_row1 .= "<tr><td colspan =8></td></tr>";
                $Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Sub Total:</td><td> ".$currency_code."" . number_format($subTotal, 2) . "</td></tr>";
                $Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Discount:</td><td> ".$currency_code."" . number_format($discount, 2) . "</td></tr>";
                $Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Discounted Total:</td><td> ".$currency_code."" . number_format($discountedPrice, 2) . "</td></tr>";
				
                $Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>GST:</td><td> ".$currency_code."" . number_format($TaxPrice, 2) . "</td></tr>";
				//code written by pratik on 07082019 start (Kerala 1% cess code)
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					if($discountedPrice!=0)
					{
	                    $cess2 = (1 / 100) * $discountedPrice;
						$Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>kerala Cess 1% :</td><td> ".$currency_code."" . number_format($cess2 , 2) . "</td></tr>";
					}
					else if($subTotal!=0)
					{
						$cess2 = (1 / 100) * $subTotal;
						$Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>kerala Cess 1% :</td><td> ".$currency_code."" . number_format($cess2, 2) . "</td></tr>";
					}
				}
				//code written by pratik on 07082019 end (Kerala 1% cess code)
				
                //$Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Shipping:</td><td> Rs." . number_format($shipping, 2) . "</td></tr>";
				if(strtolower($branch_nm)==strtolower('Kerala') && $unregistered_user=='1')
				{
					$Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Total:</td><td> ".$currency_code."" . number_format($Total + $cess2, 2) . "</td></tr>";
				}else{
					$Pricing_list_row1 .= "<tr><td  colspan = 6></td><td>Total:</td><td> ".$currency_code."" . number_format($Total, 2) . "</td></tr>";
				}
				
                $Pricing_list_row1 .= "<tr><td colspan =8></td></tr>";
            } else if ($get_group_type_row['group_type_c'] == '' && $otherCount == 0) {

                $get_acc_details2 = "SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id=id_c AND quote_id='$quote_id' AND deleted =0 AND group_type_c = '' ";
                $get_acc_details_res2 = $db->query($get_acc_details2);

                $Pricing_list_row2 .= "<tr><td colspan =7><strong>Group Name : </strong></td></tr>";
                $Pricing_list_row2 .= "<tr>";
                $Pricing_list_row2 .= "<td><strong> Quantity:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Product:</strong></td>";
                $Pricing_list_row2 .= "<td><strong>HSN CODE</td>";
                $Pricing_list_row2 .= "<td><strong> UOM:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Amount:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Tax:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Discount:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Tax Amount:</strong></td>";
                $Pricing_list_row2 .= "<td><strong> Total:</strong></td>";
                $Pricing_list_row2 .= "</tr>";

                while ($get_acc__row2 = $db->fetchByAssoc($get_acc_details_res2)) {

                    $prod_id = $get_acc__row2['product_id'];
                    $getProd = "SELECT name FROM quote_products WHERE id = '$prod_id' AND deleted =0";
                    $getProd_res = $db->query($getProd);
                    $getProd_row = $db->fetchByAssoc($getProd_res);

                    $Pricing_list_row2 .= "<tr>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row2['quantity'] . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row2['name'] . "<br/>" . $get_acc__row2['product_specification_c'] . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row2['code_c'] . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row2['uom_c'] . "</td>";
                    $Pricing_list_row2 .= "<td>" . number_format($get_acc__row2['price_c'], 2) . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row2['tax'] . "</td>";

                    $discountPrice = $get_acc__row['discount_c'];
                    if ($get_acc__row['discount_c'] < 50) {
                        $discountPrice = $get_acc__row['price_c'] * ($get_acc__row['discount_c'] / 100);
                    }
                    $Pricing_list_row2 .= "<td>" . number_format($discountPrice, 2) . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row['service_tax_c'] . "</td>";
                    $Pricing_list_row2 .= "<td>" . $get_acc__row['service_tax_val_c'] . "</td>";
                    $dis_tax_total = $dis_total * ($get_acc__row2['tax'] / 100);
                    $total = $dis_total + $dis_tax_total;
                    $Pricing_list_row2 .= "<td>" . number_format($total, 2) . "</td>";
                    $Pricing_list_row2 .= "</tr>";
                }
                $otherCount++;
            }
        }

        //echo  $Pricing_list_row1;

        $this->dv->process();

        $js = <<<BOC
		<script>
			$qp_inline
		</script>
BOC;

        $js_var = <<<EOQ
		<script>
		$(document).ready(function(){
			//alert('$Pricing_list_row');

			$('.col-sm-12').append('</table>');
			$('#LBL_DETAILVIEW_PANEL15').append('<table id="line_item" class="panelContainer" cellspacing="0">');
			$('#LBL_DETAILVIEW_PANEL15').append('$Pricing_list_row');
			$('#LBL_DETAILVIEW_PANEL15').append('$Pricing_list_row1');
			$('#LBL_DETAILVIEW_PANEL15').append('$Pricing_list_row2');
			$('#LBL_DETAILVIEW_PANEL15').append('</table>');
			// $('#LBL_DETAILVIEW_PANEL15  tr:last').after('$Pricing_list_row');
			// $('#LBL_DETAILVIEW_PANEL15  tr:last').after('$Pricing_list_row1');
			// $('#LBL_DETAILVIEW_PANEL15  tr:last').after('$Pricing_list_row2');
			// $('#LBL_DETAILVIEW_PANEL15  tr:first').remove();
		});

		</script>

		<style>

		#LBL_DETAILVIEW_PANEL15 {
			display: table !important;
			margin-left:30px;
		}
		</style>
EOQ;
//code written by pratik on 07082019 Start (Kerala 1% cess code)
echo  $hide_div = <<<HDIV
		<script>
		$(document).ready(function(){
         var state_namee = '$branch_nm';
		 var hardcoded_state = 'Kerala';
		 var unregistered_user_status = '$unregistered_user';
		 //console.log(statenm_lwr);
		 //console.log(unregistered_user_status);
		 if(state_namee.toLowerCase() == hardcoded_state.toLowerCase() && unregistered_user_status=='1')
		 {
			 
			 $('#LBL_EDITVIEW_PANEL13 div:nth-child(6)').show();
		 }else{
			 $('#LBL_EDITVIEW_PANEL13 div:nth-child(6)').hide();
		 }
       
   });
</script>
HDIV;
//code written by pratik on 07082019 End (Kerala 1% cess code)
        echo $this->dv->display();
        echo $js;
        echo $js_var;
    }

    function retrieve($tax) {
        $db = DBManagerFactory::getInstance();
        $query = "SELECT name FROM quote_quotetax WHERE quote_quotetax.tax_value='" . $tax . "' and quote_quotetax.deleted=0";
        $query = $db->query($query);
        $res = $db->fetchByAssoc($query);
        return $res['name'];
    }

}

?>

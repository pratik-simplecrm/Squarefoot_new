<?php 

//~ ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class SendEmailforProductCost {

    function send_email_for_product($bean, $event, $arguments) {
        // echo "<pre>";
        // print_r($bean);
        // exit;
        global $db, $current_user;
        $current_user_id = $current_user->id;
        // echo "unit price: "; 
        // echo $_REQUEST['unit_price_changed'];
        if ($_REQUEST['module'] == 'quote_Quote' && $_REQUEST['unit_price_changed'] == 1) {
			echo "Inside if";
            if (($current_user_id == '53a2a8db-55fb-a3f6-7955-5620a416c168') || ($current_user_id == 'b4357f32-4d34-fda8-047f-4e1ef90d7d83')) {
                $edit_unitprice = '1';
            } else {
                $edit_unitprice = '0';
            }
            $billing_account_id = $_REQUEST['quote_quote_accountsaccounts_ida'];
            ;
            $query_account_details = "SELECT name from accounts where id ='$billing_account_id' and deleted=0";
            $result_account_details = $db->query($query_account_details);
            $row_account_details = $db->fetchByAssoc($result_account_details);
            $account_name = $row_account_details['name'];
            $name = $bean->name;
            $quote_id = $bean->id;
            $quote_number = $bean->custom_quote_num_c;
            $branch = $bean->branch_c;
            $total_amount = $bean->sub_total;
            $discount_amount = $bean->discount;
            $discount_total = $bean->discounted_total;
            $get_product_id = "SELECT product_id,quantity from quote_quoteproducts where quote_id='$quote_id' and deleted=0";
            $result_product_id = $db->query($get_product_id);
            while ($row_product_id = $db->fetchByAssoc($result_product_id)) {
                $product_id = $row_product_id['product_id'];
                $quantity = $row_product_id['quantity'];
                $query2 = "	SELECT * From
						quote_products,quote_products_cstm
						WHERE id=id_c
						AND id='" . $product_id . "'
						AND deleted=0 ";
                $des2 = $db->query($query2);
                $row2 = $db->fetchByAssoc($des2);
                $tax_class = $row2['tax_class_c'];
                $uom = $row2['uom_c'];
                $type = $row2['type_c'];
                $hsn_code = $row2['hsn_code_c'];
                $sac_code = $row2['sac_code_c'];
                $gst = $row2['gst_c'];
                $unit_price = $row2['unit_price_c'];
                $bangalore_unit_price = $row2['bangalore_unit_price_c'];
                $chennai_unit_price = $row2['chennai_unit_price_c'];
                $kerala_unit_price = $row2['kerala_unit_price_c'];
                $kolkata_unit_price = $row2['kolkata_unit_price_c'];
                $delhi_unit_price = $row2['delhi_unit_price_c'];
                $hyderabad_unit_price = $row2['hyderabad_unit_price_c'];
                $mumbai_unit_price = $row2['mumbai_unit_price_c'];
                $pune_unit_price = $row2['pune_unit_price_c'];
                $goa_unit_price = $row2['goa_unit_price_c'];
                $gujarat_unit_price = $row2['gujarat_unit_price_c'];
                $haryana_unit_price = $row2['haryana_unit_price_c'];
                $up_unit_price = $row2['up_unit_price_c'];
                if ($branch == 'Bangalore') {
                    if ($bangalore_unit_price != '') {
                        $unit_price = $bangalore_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Chennai') {
                    if ($chennai_unit_price != '') {
                        $unit_price = $chennai_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Kerala') {
                    if ($kerala_unit_price != '') {
                        $unit_price = $kerala_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Kolkata') {
                    if ($kolkata_unit_price != '') {
                        $unit_price = $kolkata_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Delhi') {
                    if ($delhi_unit_price != '') {
                        $unit_price = $delhi_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Hyderabad') {
                    if ($hyderabad_unit_price != '') {
                        $unit_price = $hyderabad_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Mumbai') {
                    if ($mumbai_unit_price != '') {
                        $unit_price = $mumbai_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Pune') {
                    if ($pune_unit_price != '') {
                        $unit_price = $pune_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Pune') {
                    if ($pune_unit_price != '') {
                        $unit_price = $pune_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'goa') {
                    if ($goa_unit_price != '') {
                        $unit_price = $goa_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Gujarat') {
                    if ($gujarat_unit_price != '') {
                        $unit_price = $gujarat_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Gurgaon') {
                    if ($harayana_unit_price != '') {
                        $unit_price = $harayana_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'NOIDA') {
                    if ($up_unit_price != '') {
                        $unit_price = $up_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                }
                $unit_price = $quantity * $unit_price;
                $Total_unit_price += $unit_price;
            }
            $Total_unit_price = round($Total_unit_price, 2);
            if ($edit_unitprice == '0') {
                if ($total_amount < $Total_unit_price) {
					//echo "total amount: " . $total_amount . " total unit price : " . $Total_unit_price;exit;

                    $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                    $result_quote = $db->query($update_quote);
                    require_once('include/SugarPHPMailer.php');
                    $emailObj = new Email();
                    $defaults = $emailObj->getSystemDefaultEmail();
                    $mail = new SugarPHPMailer();
                    $mail->setMailerForSystem();
                    $mail->From = $defaults['email'];
                    //$mail->From .= 'Content-type: text/html\r\n';
                    $mail->FromName = $defaults['name'];
                    $subject = 'New Quote For Approval';
                    $mail->Subject = $subject;
                    $mail->IsHTML(true);
                    $body = <<<Email
									<p>Hello,</p>
									<p>Please find below quote details for your approval. Kindly review and let me know if any changes are required.</p>
									<br>
									<p>Account: $account_name</p>
									<p>Subject: $name</p>
									<p>Quote Number: $quote_number</p>
									<br>
									<br> 
									<p>Thanks,</p>
									<p>Squarefoot</p>
									<br>
									<p>You may review this Quote at:</p>
									https://squarefoot.simplecrmondemand.com/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                    $mail->Body = $body;
                    $mail->prepForOutbound();
                    //$emails = array('malathir@squarefoot.co.in', 'gsaraf@squarefoot.co.in');
                    $mail->AddAddress("shakeer@simplecrm.com.sg");
                    if (!$mail->Send()) {
                        //$GLOBALS['log']->fatal("email address");
                        $GLOBALS['log']->fatal('Email : Error Info:' . $mail->ErrorInfo);
                    }
                }
            }
        }
        // exit;   
    }

}

?>

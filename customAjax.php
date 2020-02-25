<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');

error_reporting(0);
ini_set('display_errors',0);

if($_REQUEST['Billing_customer_id'])  {
	global $db;
	$customer_id =$_GET['Billing_customer_id'];


	 $query1="	SELECT name ,billing_address_street , billing_address_city,billing_address_state,billing_address_postalcode,billing_address_country,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_postalcode,shipping_address_country
	  From accounts WHERE id='".$customer_id."' and deleted=0 ";
	$des=$db->query($query1);
	$row=$db->fetchByAssoc($des);
	$billing_address_street = $row['billing_address_street'];
	$billing_address_postalcode = $row['billing_address_postalcode'];
	$billing_address_country = $row['billing_address_country'];
	$billing_address_state = $row['billing_address_state'];
	$billing_address_city = $row['billing_address_city'];
	$shipping_address_street = $row['shipping_address_street'];
	$shipping_address_city = $row['shipping_address_city'];
	$shipping_address_state = $row['shipping_address_state'];
	$shipping_address_postalcode = $row['shipping_address_postalcode'];
	$shipping_address_country = $row['shipping_address_country'];

	$cust_id = $customer_id;
	$name = $row['name'];

	$data = array();
	$data['cust_id']       = $cust_id;
	$data['name']          = $name;

	$data['billing_address_street']       = $billing_address_street;
	$data['billing_address_postalcode']       = $billing_address_postalcode;
	$data['billing_address_country']       = $billing_address_country;
	$data['billing_address_state']       = $billing_address_state;
	$data['billing_address_city']       = $billing_address_city;
	$data['shipping_address_street']       = $shipping_address_street;
	$data['shipping_address_postalcode']       = $shipping_address_postalcode;
	$data['shipping_address_country']       = $shipping_address_country;
	$data['shipping_address_state']       = $shipping_address_state;
	$data['shipping_address_city']       = $shipping_address_city;
	echo json_encode($data);
}

if($_REQUEST['shipping_customer_id'])  {
	global $db;
	$customer_id =$_GET['shipping_customer_id'];

	 $query1="	SELECT name ,shipping_address_street , shipping_address_city,shipping_address_state,shipping_address_postalcode,shipping_address_country
	  From accounts WHERE id='".$customer_id."' and deleted=0 ";
	$des=$db->query($query1);
	$row=$db->fetchByAssoc($des);
	$shipping_address_street = $row['shipping_address_street'];
	$shipping_address_city = $row['shipping_address_city'];
	$shipping_address_state = $row['shipping_address_state'];
	$shipping_address_postalcode = $row['shipping_address_postalcode'];
	$shipping_address_country = $row['shipping_address_country'];


	$data1 = array();

	$data1['shipping_address_street']       = $shipping_address_street;
	$data1['shipping_address_city']       = $shipping_address_city;
	$data1['shipping_address_state']       = $shipping_address_state;
	$data1['shipping_address_postalcode']       = $shipping_address_postalcode;
	$data1['shipping_address_country']       = $shipping_address_country;

	echo json_encode($data1);
}
if($_REQUEST['product_id']){
// global $db;
// 	$product_id =$_GET['product_id'];

// 	 $query2="	SELECT tax_class_c,uom_c,type_c,hsn_code_c,sac_code_c,gst_c From
// 				quote_products,quote_products_cstm
// 				WHERE id=id_c
// 				AND id='".$product_id."'
// 				AND deleted=0 ";
// 	$des2=$db->query($query2);
// 	$row2=$db->fetchByAssoc($des2);
// 	$tax_class = $row2['tax_class_c'];
// 	$uom = $row2['uom_c'];
// 	$type = $row2['type_c'];
// 	$hsn_code = $row2['hsn_code_c'];
// 	$sac_code = $row2['sac_code_c'];
// 	$gst = $row2['gst_c'];
// 	$data =array();
// 	$data['tax_class'] = $tax_class;
// 	$data['uom']       = $uom;
// 	$data['type']       = $type;
// 	$data['hsn_code_c']       = $hsn_code;
// 	$data['sac_code_c']       = $sac_code;
// 	$data['gst_c'] = $gst;

// 	echo json_encode($data);
// }
global $db;
	$product_id =$_GET['product_id'];
	$branch = $_GET['branch'];
	//written by pratik on 03072019 start
	//$currency = trim($_GET['currency']);
	// end 
	 $query2="	SELECT * From
				quote_products,quote_products_cstm
				WHERE id=id_c
				AND id='".$product_id."'
				AND deleted=0 ";
	$des2=$db->query($query2);
	$row2=$db->fetchByAssoc($des2);
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
	//written by pratik on 03072019 start
	$unit_price_euro = $row2['unit_price_euro_c'];
	// end 
	if($branch =='Bangalore')
	{
		if($bangalore_unit_price!='')
		{
			$unit_price = $bangalore_unit_price;
		}
		else
		{
			$unit_price = $unit_price;
		}
	}
	else if($branch =='Chennai')
	{
		if($chennai_unit_price !='')
		{
			$unit_price = $chennai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kerala')
	{
		if($kerala_unit_price !='')
		{
			$unit_price = $kerala_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kolkata')
	{
		if($kolkata_unit_price !='')
		{
			$unit_price = $kolkata_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Delhi')
	{
		if($delhi_unit_price !='')
		{
			$unit_price = $delhi_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Hyderabad')
	{
		if($hyderabad_unit_price !='')
		{
			$unit_price = $hyderabad_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Mumbai')
	{
		if($mumbai_unit_price !='')
		{
			$unit_price = $mumbai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='goa')
	{
		if($goa_unit_price !='')
		{
			$unit_price = $goa_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gujarat')
	{
		if($gujarat_unit_price !='')
		{
			$unit_price = $gujarat_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gurgaon')
	{
		if($harayana_unit_price !='')
		{
			$unit_price = $harayana_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='NOIDA')
	{
		if($up_unit_price !='')
		{
			$unit_price = $up_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	$data =array();
	$data['tax_class'] = $tax_class;
	$data['uom']       = $uom;
	$data['type']       = $type;
	$data['hsn_code_c']       = $hsn_code;
	$data['sac_code_c']       = $sac_code;
	$data['gst_c'] = $gst;
	//written by pratik on 03072019
	
	$data['unit_price_c'] = number_format($unit_price, 2, '.', '');
	
 //    else if($currency == 'Euro')
	// {
	// 	if($unit_price_euro!='')
	//     $data['unit_price_c'] = number_format($unit_price_euro, 2, '.', '');
	//     else
	// 	$data['unit_price_c'] = number_format($unit_price *  0.01276, 2, '.', '');
	// }
	//end
	echo json_encode($data);
}
// written by pratik and anjali on 03072019
if($_REQUEST['newproduct_id'] && $_REQUEST['newcurrency']){
	//written by pratik on 03072019 start
	global $db;
	$product_id =$_GET['newproduct_id'];
	$branch = $_GET['newbranch'];
	
	$currency = trim($_GET['newcurrency']);
	 $query2="	SELECT * From
				quote_products,quote_products_cstm
				WHERE id=id_c
				AND id='".$product_id."'
				AND deleted=0 ";
	$des2=$db->query($query2);
	$row2=$db->fetchByAssoc($des2);
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
	//written by pratik on 03072019 start
	$unit_price_euro = $row2['unit_price_euro_c'];
	$currency_rate_euro = 0.01276;
	// end 
	if($branch =='Bangalore')
	{
		if($bangalore_unit_price!='')
		{
			$unit_price = $bangalore_unit_price;
		}
		else
		{
			$unit_price = $unit_price;
		}
	}
	else if($branch =='Chennai')
	{
		if($chennai_unit_price !='')
		{
			$unit_price = $chennai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kerala')
	{
		if($kerala_unit_price !='')
		{
			$unit_price = $kerala_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kolkata')
	{
		if($kolkata_unit_price !='')
		{
			$unit_price = $kolkata_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Delhi')
	{
		if($delhi_unit_price !='')
		{
			$unit_price = $delhi_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Hyderabad')
	{
		if($hyderabad_unit_price !='')
		{
			$unit_price = $hyderabad_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Mumbai')
	{
		if($mumbai_unit_price !='')
		{
			$unit_price = $mumbai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='goa')
	{
		if($goa_unit_price !='')
		{
			$unit_price = $goa_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gujarat')
	{
		if($gujarat_unit_price !='')
		{
			$unit_price = $gujarat_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gurgaon')
	{
		if($harayana_unit_price !='')
		{
			$unit_price = $harayana_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='NOIDA')
	{
		if($up_unit_price !='')
		{
			$unit_price = $up_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	$data =array();
	//written by pratik on 03072019
	if($currency == 'INR')
	{
		$data['unit_price'] = number_format($unit_price, 2, '.', '');
	}
    else if($currency == 'Euro')
	{
		if($unit_price_euro!='')
	    $data['unit_price'] = number_format($unit_price_euro, 2, '.', '');
	    else
		$data['unit_price'] = number_format($unit_price *  $currency_rate_euro, 2, '.', '');
	}
	//end
	echo json_encode($data);
   
  
}
// written by pratik and anjali on 04072019
if($_REQUEST['quoteid'] && $_REQUEST['currencytype'] && $_REQUEST['group'])
{
	//echo json_encode(array($_REQUEST['quoteid'],$_REQUEST['currencytype'],$_REQUEST['group']));
	//written by pratik and anjali on 04072019 start
	global $db;
	$query = "SELECT * FROM quote_quoteproducts,quote_quoteproducts_cstm WHERE id = id_c AND quote_id = '".$_REQUEST['quoteid']."' AND deleted =0";
	$res_quotedetails = $db->query($query);
	$row = array();
	 $sum = $sum1 = 0; $data = array();$Tax_Amount=$Tax_Amount1=0;
	 
	 $query1 = "SELECT `currency_id`,`sub_total`, `discounted_total`, `new_subtotal`, `grand_total`, `total_tax`, `freight_charge` as other_charges FROM `quote_quote` WHERE `id`='".$_REQUEST['quoteid']."'";
	 $conversion = $db->query($query1);
	 $row4 = $db->fetchByAssoc($conversion);
	 $currency_id = $row4['currency_id'];
	 
	 if($currency_id == '-99')
	{
		$currency_name = 'INR';
		$currency_rate_inr = 78.44;
		$currency_rate_euro = 0.01276;
	}else{ 
			 $query3 = "SELECT `iso4217`,`conversion_rate` FROM `currencies` WHERE `id`='$currency_id' and deleted='0'";   //EUR or INR
			 $conversioncrr = $db->query($query3);
			 $row5 = $db->fetchByAssoc($conversioncrr);
			 $currency_name = $row5['iso4217'];  //INR or EUR
			 $currency_rate_inr = $row5['conversion_rate'];  // 1 euro = 78.44 ruppees
			 $currency_rate_euro = 0.01276;  // 1 INR = 0.01276 Euro
	}	
	 
	while ($row = $db->fetchByAssoc($res_quotedetails))
	{
		$group_type = $row['group_type_c'];  //either Product or Installation
		$group_id = $row['group_id_c'];   // for group 1 it is 1_1 or for froup 2 it is 2_1
		$subtotal = $row['price_c'];  // addition of all
		$discount = $row['discount_c'];
		$taxpercentage = $row['service_tax_c']; 
		$othercharges = $row['other_charges_c'];
		
		if($row['group_type_c'] == 'Product' && $_REQUEST['group'] == 'group_1')
		{
			$sum += $subtotal;
			$Tax_Amount += ($subtotal * $taxpercentage)/100;
		}
		if($row['group_type_c'] == 'Installation' && $_REQUEST['group'] == 'group_2')
		{
			$sum1 += $subtotal;
			$Tax_Amount1 += ($subtotal * $taxpercentage)/100;
			
		}
	}
	//echo json_encode(array($currency_name,$row4['currency_id']));exit;
	if($currency_name == 'EUR')
	{
		if($_REQUEST['group']=='group_1' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				
				$data['Subtotal_1']  = ($sum!=0)?number_format($sum * $currency_rate_inr, 2, '.', ''):'0.00';
				$data['Discount_1']  = number_format($discount * $currency_rate_inr, 2, '.', '');
				$data['Discounted_Subtotal_1'] = number_format(($sum+$discount) * $currency_rate_inr, 2, '.', '');
				$data['Other_Charges_1'] = number_format($othercharges * $currency_rate_inr, 2, '.', '');
				$data['Tax_Amount_1'] = number_format($Tax_Amount * $currency_rate_inr, 2, '.', '');
				$data['Total_1'] 		= number_format(($sum + $Tax_Amount + $othercharges) * $currency_rate_inr, 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_1']  = ($sum!=0)?number_format($sum, 2, '.', ''):'0.00';
				$data['Discount_1']  = number_format($discount, 2, '.', '');
				$data['Discounted_Subtotal_1'] = number_format(($sum+$discount), 2, '.', '');
				$data['Other_Charges_1'] = number_format($othercharges, 2, '.', '');
				$data['Tax_Amount_1'] = number_format($Tax_Amount, 2, '.', '');
				$data['Total_1'] 		= number_format(($sum + $Tax_Amount + $othercharges), 2, '.', '');
				
		
			}
		}
		if($_REQUEST['group']=='group_2' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				$data['Subtotal_2']  = ($sum1!=0)?number_format($sum1 * $currency_rate_inr, 2, '.', ''):'0.00';
				$data['Discount_2']  = number_format($discount * $currency_rate_inr, 2, '.', '');
				$data['Discounted_Subtotal_2'] = number_format(($sum1+$discount) * $currency_rate_inr, 2, '.', '');
				$data['Other_Charges_2'] = number_format($othercharges * $currency_rate_inr, 2, '.', '');
				$data['Tax_Amount_2'] = number_format($Tax_Amount1* $currency_rate_inr, 2, '.', '');
				$data['Total_2'] 		= number_format(($sum1 + $Tax_Amount1 + $othercharges) * $currency_rate_inr, 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_2']  = ($sum1!=0)?number_format($sum1, 2, '.', ''):'0.00';
				$data['Discount_2']  = number_format($discount, 2, '.', '');
				$data['Discounted_Subtotal_2'] = number_format(($sum1+$discount), 2, '.', '');
				$data['Other_Charges_2'] = number_format($othercharges, 2, '.', '');
				$data['Tax_Amount_2'] = number_format($Tax_Amount1, 2, '.', '');
				$data['Total_2'] 		= number_format(($sum1 + $Tax_Amount1 + $othercharges), 2, '.', '');
				
		
			}
		}
		
		if($_REQUEST['group']=='group_3' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				$data['Subtotal_3']  = ($row4['sub_total']!=0)?number_format($row4['sub_total'] * $currency_rate_inr, 2, '.', ''):'0.00';
				$data['Discount_3']  = number_format($row4['discount'] * $currency_rate_inr, 2, '.', '');
				$data['Discounted_Subtotal_3'] = number_format(($row4['sub_total']+$row4['discount']) * $currency_rate_inr, 2, '.', '');
				$data['Other_Charges_3'] = number_format($row4['other_charges'] * $currency_rate_inr, 2, '.', '');
				$data['Tax_Amount_3'] = number_format($row4['total_tax'] * $currency_rate_inr, 2, '.', '');
				$data['Total_3'] 		= number_format($row4['grand_total'] * $currency_rate_inr, 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_3']  = ($row4['sub_total']!=0)?number_format($row4['sub_total'], 2, '.', ''):'0.00';
				$data['Discount_3']  = number_format($row4['discount'], 2, '.', '');
				$data['Discounted_Subtotal_3'] = number_format(($row4['sub_total']+$row4['discount']), 2, '.', '');
				$data['Other_Charges_3'] = number_format($row4['other_charges'], 2, '.', '');
				$data['Tax_Amount_3'] = number_format($row4['total_tax'], 2, '.', '');
				$data['Total_3'] 		= number_format($row4['grand_total'], 2, '.', '');
				
		
			}
		}
		
		
	}
	if($currency_name == 'INR')
	{
		if($_REQUEST['group']=='group_1' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				
				$data['Subtotal_1']  = ($sum!=0)?number_format($sum, 2, '.', ''):'0.00';
				$data['Discount_1']  = number_format($discount, 2, '.', '');
				$data['Discounted_Subtotal_1'] = number_format(($sum+$discount), 2, '.', '');
				$data['Other_Charges_1'] = number_format($othercharges, 2, '.', '');
				$data['Tax_Amount_1'] = number_format($Tax_Amount, 2, '.', '');
				$data['Total_1'] 		= number_format(($sum + $Tax_Amount + $othercharges) * $currency_rate, 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_1']  = ($sum!=0)?number_format($sum * $currency_rate_euro, 2, '.', ''):'0.00';
				$data['Discount_1']  = number_format($discount * $currency_rate_euro, 2, '.', '');
				$data['Discounted_Subtotal_1'] = number_format(($sum+$discount) * $currency_rate_euro, 2, '.', '');
				$data['Other_Charges_1'] = number_format($othercharges * $currency_rate_euro, 2, '.', '');
				$data['Tax_Amount_1'] = number_format($Tax_Amount * $currency_rate_euro, 2, '.', '');
				$data['Total_1'] 		= number_format(($sum + $Tax_Amount + $othercharges) * $currency_rate_euro, 2, '.', '');
				
		
			}
		}
		if($_REQUEST['group']=='group_2' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				$data['Subtotal_2']  = ($sum1!=0)?number_format($sum1, 2, '.', ''):'0.00';
				$data['Discount_2']  = number_format($discount, 2, '.', '');
				$data['Discounted_Subtotal_2'] = number_format(($sum1+$discount), 2, '.', '');
				$data['Other_Charges_2'] = number_format($othercharges, 2, '.', '');
				$data['Tax_Amount_2'] = number_format($Tax_Amount1, 2, '.', '');
				$data['Total_2'] 		= number_format(($sum1 + $Tax_Amount1 + $othercharges), 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_2']  = ($sum1!=0)?number_format($sum1 * $currency_rate_euro, 2, '.', ''):'0.00';
				$data['Discount_2']  = number_format($discount * $currency_rate_euro, 2, '.', '');
				$data['Discounted_Subtotal_2'] = number_format(($sum1+$discount) * $currency_rate_euro, 2, '.', '');
				$data['Other_Charges_2'] = number_format($othercharges * $currency_rate_euro, 2, '.', '');
				$data['Tax_Amount_2'] = number_format($Tax_Amount1 * $currency_rate_euro, 2, '.', '');
				$data['Total_2'] 		= number_format(($sum1 + $Tax_Amount1 + $othercharges) * $currency_rate_euro, 2, '.', '');
				
		
			}
		}
		
		if($_REQUEST['group']=='group_3' && isset($_REQUEST['group']))
		{
			if($_REQUEST['currencytype'] == 'INR')
			{
				$data['Subtotal_3']  = ($row4['sub_total']!=0)?number_format($row4['sub_total'], 2, '.', ''):'0.00';
				$data['Discount_3']  = number_format($row4['discount'], 2, '.', '');
				$data['Discounted_Subtotal_3'] = number_format(($row4['sub_total']+$row4['discount']), 2, '.', '');
				$data['Other_Charges_3'] = number_format($row4['other_charges'], 2, '.', '');
				$data['Tax_Amount_3'] = number_format($row4['total_tax'], 2, '.', '');
				$data['Total_3'] 		= number_format($row4['grand_total'], 2, '.', '');
			}
			if($_REQUEST['currencytype'] == 'Euro')
			{
				$data['Subtotal_3']  = ($row4['sub_total']!=0)?number_format($row4['sub_total'] * $currency_rate_euro, 2, '.', ''):'0.00';
				$data['Discount_3']  = number_format($row4['discount'] * $currency_rate_euro, 2, '.', '');
				$data['Discounted_Subtotal_3'] = number_format(($row4['sub_total']+$row4['discount']) * $currency_rate_euro, 2, '.', '');
				$data['Other_Charges_3'] = number_format($row4['other_charges'] * $currency_rate_euro, 2, '.', '');
				$data['Tax_Amount_3'] = number_format($row4['total_tax'] * $currency_rate_euro, 2, '.', '');
				$data['Total_3'] 		= number_format($row4['grand_total'] * $currency_rate_euro, 2, '.', '');
				
		
			}
		}
		
		
		

	}
	echo json_encode($data);
}
//written by pratik and anjali on 09072019 start
if($_REQUEST['sqm_box_id'] && $_REQUEST['prod_ID'] && $_REQUEST['sqm_box_val'])
{
	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	 if(isset($_REQUEST['sqm_box_id']) && isset($_REQUEST['prod_ID']) && isset($_REQUEST['sqm_box_val']))
	 {
		 $query1 = "SELECT `sqm_value_c` FROM `quote_products_cstm` WHERE `id_c`='".$_REQUEST['prod_ID']."' and uom_c='SQM'";
		 $sqmbox = $db->query($query1);
		 $row = $db->fetchByAssoc($sqmbox);
		 $sqmboxsize = $row['sqm_value_c'];
		 //$data['quantity'] = ($sqmboxsize !=0)?number_format(($_REQUEST['sqm_box_val'] / $sqmboxsize), 2, '.', ''):number_format(0.00, 2, '.', '');
		 $data['quantity'] = ($sqmboxsize !=0)?number_format((ceil($_REQUEST['sqm_box_val'] / $sqmboxsize) * $sqmboxsize), 3, '.', ''):number_format(0.00, 2, '.', '');
		 $data['sqm_box_id'] = $_REQUEST['sqm_box_id'];
		 echo json_encode($data);
		 
	 }
	
	
	
}
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
if($_REQUEST['oppid'])
{

	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	//print_r($_REQUEST['oppid']);exit;
	 if(isset($_REQUEST['oppid']))
	 {
	 	$query1 = "select `filename`,`file_mime_type` from opportunities WHERE `id`='".$_REQUEST['oppid']."'";
	 	$oppid1 = $db->query($query1);
		$row = $db->fetchByAssoc($oppid1);

		if($row['filename']!='' && $row['file_mime_type']!='')
		{
			 $query2 = "UPDATE `opportunities` SET `filename`='' ,`file_mime_type`='' WHERE id='".$_REQUEST['oppid']."'";
			 $result = $db->query($query2);
			 if ($result)
			 {
			 	$data['success'] = 'true';
			 	
			 }
		}
		 
		 
	 }
	 echo json_encode($data);

}
	
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field end (PO Column option - opportunity module)

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
if($_REQUEST['opptuid'])
{

	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	//print_r($_REQUEST['oppid']);exit;
	 if(isset($_REQUEST['opptuid']))
	 {
	 	$query1 = "select `filename`,`file_mime_type` from opportunities WHERE `id`='".$_REQUEST['opptuid']."'";
	 	$oppid1 = $db->query($query1);
		$row = $db->fetchByAssoc($oppid1);

		if($row['filename']!='' && $row['file_mime_type']!='')
		{
			 
			 	$data['success'] = 'not_blank';
			 	
			 
		}else{
			
			$data['success'] = 'blank';
		 
		 
			}
	 }
	 echo json_encode($data);

}
	
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field end (PO Column option - opportunity module)

//written by pratik for meeting->scheduling functionality on 17122019 start
if($_REQUEST['start_date'] && $_REQUEST['end_date'] && $_REQUEST['username'])
{
	global $db; $data = array();
	$meeting_start_date = $_REQUEST['start_date'];
	$meeting_end_date = $_REQUEST['end_date'];
	$username = $_REQUEST['username'];
	
	$sdate = explode(" ",$meeting_start_date);
	$startd = date('Y-m-d', strtotime($sdate[0]));
	$starttime_in_24_hour_format  = date("H:i", strtotime($sdate[1])).":00";
	$final_s_date = $startd." ".$starttime_in_24_hour_format; 
	$date_start11 = date("Y-m-d H:i:s",strtotime('-5 hours -30 minutes', strtotime($final_s_date)));	
	
	$edate = explode(" ",$meeting_end_date);
	$endd = date('Y-m-d', strtotime($edate[0]));
	$endtime_in_24_hour_format  = date("H:i", strtotime($edate[1])).":00";
	$final_end_date = $endd." ".$endtime_in_24_hour_format;
    $end_start11 = date("Y-m-d H:i:s",strtotime('-5 hours -30 minutes', strtotime($final_end_date)));	
	
	//echo $date_start11." ".$end_start11;
	//echo $date_start11." ".$end_start11;
	//exit;
	//echo $final_s_date." ".$final_end_date." ".$username;
	//exit;
	    $query1 = "SELECT `id` FROM `users` WHERE `user_name`='".$_REQUEST['username']."' and deleted=0";
	 	$result = $db->query($query1);
		$row = $db->fetchByAssoc($result);
		$user_id = $row['id'];
		if(!empty($user_id))
		{
			//$query = "SELECT * FROM `meetings` as A inner join meetings_cstm as B on A.id=B.id_c WHERE TIME(`date_start`) >= CAST('$starttime_in_24_hour_format' AS time) AND TIME(`date_end`) <= CAST('$endtime_in_24_hour_format' AS time) and B.`user_id1_c`='$user_id' and A.deleted=0 and DATE(`date_start`)='$startd' and DATE(`date_end`)='$endd'";
			
			//$check_user_availabilty = $db->query("SELECT * FROM `meetings` as A inner join meetings_cstm as B on A.id=B.id_c WHERE (`date_start`>='$final_s_date' and `date_end`<='$final_end_date') and `user_id1_c`='$user_id' and A.deleted=0");
			$check_user_availabilty = $db->query("SELECT * FROM `meetings` as A inner join meetings_cstm as B on A.id=B.id_c WHERE  B.`user_id1_c`='$user_id' and A.deleted=0 and `date_start`>='$date_start11' and DATE(`date_end`)<='$end_start11' and LOWER(`status`) = 'planned'");
			if($check_user_availabilty->num_rows ==0)
			{
				$data['success'] = '1';
			}else{
				$data['success'] = '0';
			}
			
			
		}
	echo json_encode($data);
	
	//exit;
	
}
<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');

error_reporting(0);
ini_set('display_errors',0);
if($_REQUEST['product_id']){
global $db;
	$product_id =$_GET['product_id'];
	$amt =$_GET['amt'];
	$branch = $_GET['branch'];
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
	$unit_price = round($row2['unit_price_c'],2);
	
	$amt_diff = $unit_price - $amt;
	
	$dis_percent = round(($amt_diff / $unit_price) * 100 , 2);
	
	echo json_encode(array("unit_price" => $unit_price, "discount" => $dis_percent));
	/*
	
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
	
	if($amt < $unit_price)
	{
		//echo "Manasa";
		echo "yes";
		//exit;
	}
	else
	{
		echo "no";
	}
	//echo json_encode($data);
	*/
}


?>

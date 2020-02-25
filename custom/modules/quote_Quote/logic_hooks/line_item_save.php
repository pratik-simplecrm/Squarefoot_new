<?php
/**
 *  Author: Bhea Knowledge Technologies
 *  Created By: Hatim Alam
 *  Dated: 16092013
 *  Description: to save the quote line items on new record generation or old record updation.
*/

if(!defined('sugarEntry')) die('Not a valid Entry Point');
require_once('include/utils.php');

//error_reporting(E_ALL);
ini_set('display_errors',0);
class LineItemSave {

	function line_item_after_save(&$bean=null, $event=null, $arguments=null) {
		//define global objects
		global $db;
		global $current_user;

		$user = $current_user->id;
		// echo '<pre>';
		// print_r($_REQUEST);exit;

		 // require_once('modules/quote_QuoteProducts/quote_QuoteProducts.php');
		 // $quotsObj = new quote_QuoteProducts();
		 $quote_id = $bean->id;
			if( !empty($quote_id) ){
				//$query = " DELETE FROM quote_quoteproducts_cstm WHERE id_c in( SELECT id FROM quote_quoteproducts WHERE quote_id='$quote_id' )";
				if($bean->old_pli_c != ''){
				$deletedID = explode(",",$bean->old_pli_c);
					foreach( $deletedID as $pliID){
						if( $pliID != '' ){
							$replacedID = str_replace(',','',$pliID);
							$query = "UPDATE quote_quoteproducts SET deleted =1  WHERE quote_id='".$quote_id."' and id='".$replacedID."'";
							$db->query($query);

							$file=fopen("/var/www/html/squarefoot/prodbackup/updateResponse.txt", 'a');
							$msg ="Product ID:".$pliID."\n";
							fwrite($file,$msg);
						}
					}
				}
				//~ $query = "UPDATE quote_quoteproducts SET deleted =1  WHERE quote_id='$quote_id'";
				//~ $db->query($query);
				//~ exit;
				//$query = " DELETE FROM quote_quoteproducts WHERE quote_id='$quote_id' ";
				//$db->query($query);
			}
		 for($g=1;$g<=6;$g++){    //Run Foreach loop Based on No Of Group 3

			for($r=1;$r<=50;$r++){   //Run Foreach loop Based on No Of Group 3

					 //Set the Variables
					 $product_name = 'product_'.$g.'_'.$r;
					 $quantity     = 'quantity_'.$g.'_'.$r;
					 $product_id   = 'product_'.$g.'_'.$r.'_id';
					 $price        = 'price_'.$g.'_'.$r;
					 $discount     = 'discount_'.$g.'_'.$r;
					 $quote_tax    = 'quote_tax_'.$g.'_'.$r;
					 //~ $dis_check    = 'in_'.$g.'_'.$r;
					 $dis_check    = 'dis_check_'.$g.'_'.$r;
					 $group_id     = 'group_id_'.$g.'_'.$r;
					 $uom     	   = 'uom_'.$g.'_'.$r;
					 $code = 'code_'.$g.'_'.$r;
					 $charges ='charges_'.$g.'_'.$r;
					 $service_tax  = 'service_tax_'.$g.'_'.$r;
					 $amount = 'amount_'.$g.'_'.$r;
					 //$service_tax_val  = 'service_tax_val_'.$g.'_'.$r;
					 $product_spec  = 'prod_spec_'.$g.'_'.$r;
					 $shipping_amt  = 'shipping_amt_'.$g.'_'.$r;
					 $lineItemID  = 'pli_id_'.$g.'_'.$r;
					 $group_line_id 	  =  $g.'_'.$r;


					 $dupicatelineItemIDValue     = $_REQUEST['duplicateId'];
					 //~ $GLOBALS['log']->fatal($dupicatelineItemIDValue."line Item value");
						// 	echo "<pre>";
						// print_r($_REQUEST);exit;
			         $product_name     = $_REQUEST[$product_name];
					 $quantity         = $_REQUEST[$quantity];
					 $product_id       = $_REQUEST[$product_id];
					 $price            = $_REQUEST[$price];
					 $discount         = $_REQUEST[$discount];
					 $discounted_price = ($_REQUEST['in']) ? ($price*$discount)/100 : $discount;
					 $quote_tax        = $_REQUEST[$quote_tax];
					 $dis_check  	   = $_REQUEST[$dis_check];
					 $group_id  	   = $_REQUEST[$group_id];
					 $uom		  	   = $_REQUEST[$uom];
					 $code = $_REQUEST[$code];
					 $charges = $_REQUEST[$charges];
					 // if($group_id =='Installation')
					 // {
					 // 	$charges ='0';
					 // }
					 $service_tax	   = $_REQUEST[$service_tax];
					 $amount = $_REQUEST[$amount];
					 //$service_tax_val  = $_REQUEST[$service_tax_val];
					 $product_spec     = $_REQUEST[$product_spec];
					 $shipping_amt     = $_REQUEST[$shipping_amt];
					 $lineItemIDValue     = $_REQUEST[$lineItemID];

					 $record  = $bean->id;

					 $user = $current_user->id;
					 // $quotsObj->save(true);

//print_r($discount); exit;

					/* Added by Rajni for blank decimal values dated 31 jan 2020*/
					if(empty($price)) $price = 0;
					if(empty($discount)) $discount = 0;
					if(empty($discounted_price)) $discounted_price = 0;
					if(empty($service_tax)) $service_tax = 0;
					if(empty($service_tax_val)) $service_tax_val = 0;
					if(empty($shipping_amt)) $shipping_amt = 0;
					if(empty($charges)) $charges = 0;

					if($product_id ){
						 if( $lineItemIDValue == '' || $dupicatelineItemIDValue != ''){
							$new_id = create_guid();
							$insertbookplan="INSERT INTO quote_quoteproducts (
											id,name,date_entered,date_modified,modified_user_id,created_by,
											description,deleted,assigned_user_id,dis_check,quantity,quote_id,product_id,tax
										)
										VALUES (
											'$new_id','$product_name',now(),now(),'$user','$user',
											'',0,'$user','$dis_check','$quantity','$record','$product_id','$quote_tax')";
											$GLOBALS['log']->fatal($insertbookplan,"Quotes products");
							$db->query($insertbookplan);

							

							$insertbookplan2="INSERT INTO `quote_quoteproducts_cstm`(`id_c`, `group_id_c`, `group_type_c`, `uom_c`, `price_c`, `discount_c`, `discounted_price_c`, `service_tax_c`, `service_tax_val_c`, `product_specification_c`, `shipping_c`, `code_c`,`other_charges_c` 
										)
										VALUES (
											'$new_id','$group_line_id','$group_id','$uom','$price','$discount','$discounted_price',
											'$service_tax','0','$product_spec','$shipping_amt','$code','$charges'
										)";
										$GLOBALS['log']->fatal($insertbookplan2,"Quotes products cstm");
							$db->query($insertbookplan2);
						//exit;
						$GLOBALS['log']->fatal('Product Name='.$product_name.'Disc Check='.$dis_check.'Service Tax='.$service_tax);						
					}
					else{
							$insertbookplan3="UPDATE quote_quoteproducts SET name = '$product_name',date_modified= now(),modified_user_id = '$user',created_by = '$user',description = '',deleted = 0,assigned_user_id = '$user', dis_check = '$dis_check', quantity = '$quantity', quote_id = '$record', product_id = '$product_id', tax = '$quote_tax' WHERE quote_id='".$record."' and id='".$lineItemIDValue."'";
							$db->query($insertbookplan3);
					
							$insertbookplan4="UPDATE quote_quoteproducts_cstm SET group_id_c = '$group_line_id', group_type_c = '$group_id', uom_c = '$uom', discount_c = '$discount', price_c = '$price', discounted_price_c = '$discounted_price', service_tax_c = '$service_tax', service_tax_val_c = '$service_tax_val', product_specification_c = '$product_spec', shipping_c = '$shipping_amt',code_c='$code',other_charges_c='$charges' WHERE id_c = '".$lineItemIDValue."'";
							$db->query($insertbookplan4);
					/*echo "<pre>insertbookplan: "; print_r($insertbookplan3); 
					echo "<pre>insertbookplan2: "; print_r($insertbookplan4); 
					exit;*/
					
							$GLOBALS['log']->fatal('Product Name='.$product_name.'Disc Check='.$dis_check.'Service Tax='.$service_tax);
					}

				}
			 }
		//exit;
		 }
	}


	/**
	 * Desc: to return the array of products
	 * containing details to be saved in db
	 * Dated: 16092013
	 * By: Hatim Alam
	 */
	function return_array($request, $id) {
		$totCount = $request['total_rows'];
		$i = 0;
		$j = 1;
		$k = 0;
		for($i=0; $i<$totCount; $i++) {
			if(!isset($request['product'.$j])) {
				$j++;
			} else {
				$products[$k]['name'] = !empty($request['product'.$j]) ? $request['product'.$j] : '';
				$products[$k]['prod_id'] = !empty($request['product'.$j.'_id']) ? $request['product'.$j.'_id'] : 0;
				$products[$k]['quan'] = !empty($request['quantity'.$j]) ? $request['quantity'.$j] : 0;
				$products[$k]['price'] = !empty($request['price'.$j]) ? $request['price'.$j] : 0;
				$products[$k]['tax'] = !empty($request['quote_tax'.$j]) ? $request['quote_tax'.$j] : 0;
				$products[$k]['disc'] = !empty($request['discount'.$j]) ? $request['discount'.$j] : 0;
				$products[$k]['in'] = !empty($request['in'.$j]) ? 1 : 0;
				$products[$k]['rec_id'] = !empty($request['prod_rec'.$j.'_id']) ? $request['prod_rec'.$j.'_id'] : 0;
				$products[$k]['quote_id'] = !empty($id) ? $id : 0;
				$j++;
				$k++;
			}
		}
		return $products;
	}

	/**
	 * Desc: to save the beans
	 * parameters: module name and array of values to be saved in bean
	 * Dated: 16092013
	 * By: Hatim Alam
	 */
	function save_bean($module_name, $products) {
		//include the module file
		include_once('modules/'.$module_name.'/'.$module_name.'php');
		//iterate over the passed array
		foreach($products as $product) {

			//calculate the discounted price
			$amt = $product['quan']*$product['price'];
			$tot_dis_per_prod = ($product['in']) ? ($amt*$product['disc'])/100 : $product['disc'];

			//create module object
			$mod_obj = new $module_name();
			if ($product['rec_id'] != '0') {
				$mod_obj->retrieve($product['rec_id']);
			}
			//populate the quoteProduct module
			$mod_obj->name			   = $product['name'];
			$mod_obj->product_id	   = $product['prod_id'];
			$mod_obj->price			   = $product['price'];
			$mod_obj->discount		   = $product['disc'];
			$mod_obj->dis_check		   = $product['in'];
			$mod_obj->discounted_price = $tot_dis_per_prod;
			$mod_obj->quote_id		   = $product['quote_id'];
			$mod_obj->quantity		   = $product['quan'];
			$mod_obj->tax			   = $product['tax'];
			$mod_obj->group_id_c	   = $product['group_id_c'];
			$mod_obj->group_type_c	   = $product['group_type_c'];
			$mod_obj->save();
		}
		return true;
	}

	/**
	 * Desc: to delete the specific beans
	 * parameters: module name and array of ids to be mark deleted
	 * Dated: 16092013
	 * By: Hatim Alam
	 */
	function delete_bean($module_name, $ids) {
		//include the module file
		include_once('modules/'.$module_name.'/'.$module_name.'php');
		//iterate over the passed array
		foreach($ids as $del_id) {
			$mod_obj = new $module_name();
			$mod_obj->retrieve($del_id);
			$mod_obj->mark_deleted();
			$mod_obj->save();
		}
		return true;
	}

}

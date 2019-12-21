<?php



if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

  class process_record
    {
        function process_record_method($bean, $event, $arguments)
        {

				global $db,$sugar_config, $current_user;
				$id = $bean->id;
				$cb="test";
                                $get_user_email="SELECT email_address
					   FROM email_addresses e, email_addr_bean_rel ec
					   WHERE bean_id ='".rtrim($id)."'
					   AND ec.email_address_id = e.id
					   AND e.opt_out =0
					   AND e.deleted =0
					   AND ec.deleted =0";
                                $user_result = $db->query($get_user_email);
                                $user_row = $db->fetchByAssoc($user_result);
                                $user_email = $user_row['email_address'];
                                //Default value which are not mask
                                $bean->email_address_c=$user_email;
                                $mask_phone_mob = $bean->phone_mobile;
                                $mask_phone_home = $bean->phone_home;
                                $account_id = $bean->id;        
                                $login_userid = $current_user->id;                
                                require_once("modules/ACLRoles/ACLRole.php");
                                $acl_role_obj = new ACLRole();
                                $user_roles[] = $acl_role_obj->getUserRoles($current_user->id);
                                $maskrole='';
                                if (!empty($user_roles[0])) {
                                    foreach ($user_roles[0] as $k => $v) {
                                        if ($v == 'Head of Branch' || $v == 'Branch Life Operations (LOP)'|| $v == 'Manager Business Development'|| $v == 'Senior Manager Business Development'|| $v == 'Branch Accountant') {
                                            //Get the login user agent code 
                                                $user_query = "SELECT uc.user_code_c as agent_code from users u , users_cstm uc 
                                                                    where u.id=uc.id_c AND u.deleted=0 AND u.id = '$login_userid'";
                                                $user_result =$db->query($user_query);
                                                $user_row= $db->fetchByAssoc($user_result);
                                                $agent_code = $user_row['agent_code'];

                                                //Get the policy count based on the agent code 
                                                $policy_query = "SELECT p.id FROM accounts_scrm_policy_purchased_1_c apc, scrm_policy_purchased p WHERE apc.accounts_scrm_policy_purchased_1accounts_ida = '$account_id' AND apc.accounts_scrm_policy_purchased_1scrm_policy_purchased_idb = p.id AND p.deleted =0 AND p.agent_code = '$agent_code'";
                                                $getpolicy_result  = $db->query($policy_query);
                                                $policy_count = $getpolicy_result->num_rows;
                                                if(!($policy_count>0)){
                                                    //Fields which are masked 
                                                    //$show_part = substr($bean->phone_mobile, -4);
                                                    $mask_phone_mob = '**********';
                                                    $mask_phone_home = '**********';
                                                    $bean->email_address_c = '****@***';  
                                                }
                                        }
                                    }
                                }
                            
				$mobile_number = trim($bean->phone_mobile);
				$home_number = trim($bean->phone_home);
                                 
				if (strlen($mobile_number)) {
					$correctValue =  '<span class="phone_mobile">'.$mask_phone_mob.'<i class="fa fa-phone" onclick="mobile_popup(\''.trim($mobile_number).'\')"></i></span>';
					$bean->phone_mobile = $correctValue;
					//$bean->phone_mobile = $bean->phone_mobile +'<i class="fa fa-phone" id="mobile_popup"></i>';
				}
				if(strlen($home_number))
				{
					$correctValue1 =  '<span class="phone_home">'.$mask_phone_home.'<i class="fa fa-phone" onclick="home_popup(\''.trim($home_number).'\')"></i></span>';
					$bean->phone_home = $correctValue1;

				}
                                
				// echo "<pre>";
				// print_r($bean-);
				// echo "</pre>";
				// exit;
				//echo '--->'.$bean->email1;
				// $module=$_REQUEST['module'];
				// $rc=BeanFactory::getBean('scrm_Retail_Customer',$id);
				// //echo $rc->email1;

				//  $query1 ="SELECT * FROM scrm_retail_customer JOIN scrm_retail_customer_cstm ON(scrm_retail_customer.id=scrm_retail_customer_cstm.id_c) WHERE id='$id'";
 			// 	 $data=$db->query($query1);
 			// 	 $data=$db->fetchByAssoc($data);  
 			// // 	 echo "<pre>";
 			// // 	 // print_r($data);
 			// // print_r($bean);
 			// 	 $customer=$data['salutation'].'&nbsp;'.$data['first_name'].'&nbsp;'.$data['last_name'];
 			// 	//echo
				// $product_query="SELECT products.name FROM `aos_products` AS products JOIN scrm_retail_customer_aos_products_1_c AS customers_product ON customers_product.scrm_retail_customer_aos_products_1aos_products_idb = products.id AND customers_product.deleted =0 WHERE customers_product.scrm_retail_customer_aos_products_1scrm_retail_customer_ida = '$id' AND products.deleted =0 ORDER by customers_product.date_modified DESC LIMIT 0 , 4 ";

				// $data1=$db->query($product_query);
 			// 	//$data=$db->fetchByAssoc($data);
 			// 	// echo "<pre>";
 			// 	// print_r($data);
 			// 	if(is_array($product=$db->fetchByAssoc($data1))){
 			// 	 while($product=$db->fetchByAssoc($data1)){

 			// 	 	//echo $product['name'];

 			// 	 	$unit= rand (1,10);
 			// 	 	$cost=$unit*10000;
 			// 	 	$pro_html.="<li><a href='#' target='_blank'>$product[name]</a></li><p class='sub-lidata'>Holding: $unit, Amount: Rs $cost</p>";
 			// 	 }
				// }else{
 				 
				// 	$pro_html.="<li><a href='#' target='_blank'>No data</a></li>";

				// }


				// $ticket_query="SELECT name ,date_entered,status,state FROM `cases` JOIN scrm_retail_customer_cases_1_c ON scrm_retail_customer_cases_1_c.scrm_retail_customer_cases_1cases_idb = cases.id WHERE scrm_retail_customer_cases_1_c.scrm_retail_customer_cases_1scrm_retail_customer_ida = '$id' AND cases.deleted =0 ORDER by cases.date_entered DESC LIMIT 0 , 4"; 

$data_flip_id=$data['id']."_flip_click";
$data_block_id=$data['id']."_block";
				$Code=<<<EOD
			

<style>
	
	</style>
        <script type="text/javascript">
        function flipTile(x){					
                $('#'+x).toggleClass('flipped');
                }
          function mobile_popup(mobile_number)
          {
          	var meta_tag ='<meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="referrer" content="no-referrer"/>';
          	//alert(mobile_number);
          	$('meta').replaceWith(meta_tag);
          	mobile_number = '9'+ mobile_number;
				//window.location.href = 'https://192.168.254.50:443/webdailer/Webdailer?destination='+mobile_number;
				window.open('https://192.168.254.50:8443/webdialer/Webdialer?destination='+mobile_number, "myWindow", 'width=800,height=600');
				//window.close();
          }
          function home_popup(home_number)
          {
          	var meta_tag ='<meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="referrer" content="no-referrer"/>';
          	//alert(mobile_number);
          	$('meta').replaceWith(meta_tag);
          	home_number = '9' + home_number;
				//window.location.href = 'https://192.168.254.50:443/webdailer/Webdailer?destination='+mobile_number;
				window.open('https://192.168.254.50:8443/webdialer/Webdialer?destination='+home_number, "myWindow", 'width=800,height=600');
				//window.close();
          }
        </script>                                

	<a style='cursor:pointer;' onclick='openModal("$id")'><i class='fa fa-eye' style='cursor:pointer;margin-left:26px;'></i></a>
EOD;
	
				

				 $bean->action=$Code;


		}
	}
?>

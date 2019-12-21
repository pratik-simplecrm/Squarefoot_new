<?php
ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class updateServiceCordinator
{
		static $already_ran = false;
		
		function update_Service_Coordinator($bean,$event,$arguments)
        {
			
			if(self::$already_ran == true) return;
			self::$already_ran = true;
		
			global $db, $current_user; 
			//echo $current_user->id;
			/* require_once("modules/ACLRoles/ACLRole.php");
            $acl_role_obj = new ACLRole(); 
            $user_roles = $acl_role_obj->getUserRoles($current_user->id);
			print_r($user_roles);exit;
            echo $current_user_role = $user_roles[0];
			exit; */
			//echo "<pre>";
			//print_r($bean);
			//exit;
			if(empty($bean->assigned_user_id) && empty($bean->region_c))
			{	
			   
			     $assigned_keys = array();
				 $assigned_values = array();
				 $final_assigned_user_id = array();
				 $final_random_assigned_user_id='';
				 $login_username = $current_user->user_name;
				 $get_loginuserbranch = "SELECT `branch_c` FROM `users_cstm` as A inner join `users` as B on A.id_c = B.id WHERE user_name = '$login_username'";
				 $branchname = $db->query($get_loginuserbranch);
				 $row11 = $db->fetchByAssoc($branchname);
				 $branch_name = trim($row11['branch_c']);
				 
				 //maintain log to check branch of login user geeting or not start
					 $APILogFile = 'assigned_service_coordinator.txt';
					 $handle = fopen($APILogFile, 'a');
					 $timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
					 $logMessage = "\nassigned_service_coordinator Result at $timestamp :-\n Branch Name: $branch_name";
					 fwrite($handle, $logMessage);		
					 fclose($handle);
				//End
				 
				 $get_role_id = "SELECT * FROM `acl_roles` WHERE LOWER(`name`)='service co-ordinator' and `deleted`=0";
				 $roleid = $db->query($get_role_id);
				 while($role = $db->fetchByAssoc($roleid))
				 {
						 $role_id = trim($role['id']);
						 
						 $get_user_id = "SELECT `user_id` FROM `acl_roles_users` as A inner join `users` as B on A.user_id=B.id inner join `users_cstm` as C on B.id=C.id_C  WHERE `role_id`='$role_id' and A.`deleted`=0 and C.branch_c='$branch_name' and B.deleted=0 and B.status='Active'";
						 $userid = $db->query($get_user_id);
						 while($user = $db->fetchByAssoc($userid))
						 {
							 $user_id = trim($user['user_id']);  // user under service co-ordinator role
							 if($user_id!='' && $branch_name!='')
							 {
								//fetch Active service co-ordinator cases assigned count
                                $get_case_Assigned_count_of_supervisor = "SELECT count(*) as assigned_count FROM `cases` WHERE `assigned_user_id`='$user_id' and deleted=0";
								$result = $db->query($get_case_Assigned_count_of_supervisor);
								$row = $db->fetchByAssoc($result);
								$assigned_count = (!empty($row['assigned_count'])?$row['assigned_count']:0);
								$assigned_keys[] = $user_id;   // all service co-ordinator ids
								$assigned_values[] = $assigned_count; // all service co-ordinator case assigned count 
										
							 } 
					
							}
	
				}
				//print_r($assigned_keys);
				//print_r($assigned_values);
				//exit;
				if(!empty($assigned_keys) && !empty($assigned_values))
				{
						// combine key and value array
								$final_arr = array_combine($assigned_keys, $assigned_values);
								
								//get all values of array
								$arrval = array_values($final_arr);
								
								// check all values of array are same or not (if all are same then return 1 else blank
								$allValuesAreTheSame = (count(array_unique($arrval)) === 1);
								if($allValuesAreTheSame==1)
								{
									//if count of all service co-ordinator are same then take any one randomly
									$final_random_assigned_user_id = array_rand($final_arr);
								}else{
								
										//find minimum assigned user(service co-ordinator ) count
										$final_assigned_user_id = array_keys($final_arr, min($final_arr)); 
										
								}
								//echo "A=".$final_random_assigned_user_id;
								//echo "B=".$final_assigned_user_id[0];
								//exit;
								
							
								//****************LOG Creation*********************
								$APILogFile = 'assigned_service_coordinator.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
								//date('Y-m-d H:i:s');
								$logArray = array('final_assigned_user_id'=>$final_assigned_user_id,'branch_name'=>$branch_name,'allValuesAreTheSame'=>$allValuesAreTheSame,'final_random_assigned_user_id'=>$final_random_assigned_user_id);
								$logArray1 = print_r($final_arr, true);
								$logArray2 = print_r($logArray, true);
								$logMessage = "\nassigned_service_coordinator Result at $timestamp :-\n$logArray1";
								$logMessage1 = "\nassigned_service_coordinator Result at $timestamp :-\n$logArray2";
								fwrite($handle, $logMessage);		
								fwrite($handle, $logMessage1);										
								fclose($handle);
								//****************ENd OF Code*****************
				}
								
							if(isset($final_random_assigned_user_id) && !empty($final_random_assigned_user_id))
							{ 
								//echo "gggfffddddddddggg".$final_random_assigned_user_id;
								//exit;
							// $bean->assigned_user_id = $final_random_assigned_user_id;
							 $bean->region_c = $branch_name;
							 $bean->save();
							}
							else{
									if(!empty($final_assigned_user_id))
									{
										//echo "gggfffggg";
										//exit;
										//$bean->assigned_user_id = $final_assigned_user_id[0];
										$bean->region_c = $branch_name;
										$bean->save();
									}
								}
							
					
			}
		}
		
		
}	
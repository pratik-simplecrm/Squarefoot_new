<?php
//ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class CreateCase
{
		static $already_ran = false;
		
		
		function create_case($bean,$event,$arguments)
        {
			
			if(self::$already_ran == true) return;
			self::$already_ran = true;
		
			global $db, $current_user; 
	
			
			$upd_branch_name =$case_subject='';
			$meeting_id = $bean->id;
			$login_username = $current_user->user_name;
			$meeting_types_arr = array("MS","PREINS","INS");
			//$case_subject = $bean->name;
			$case_type = $bean->meetingtype_c;
			if($case_type=='MS')
			{
				$case_subject = 'Schedule for Measurement';
			}else if($case_type=='PREINS')
			{
				$case_subject = 'Schedule for Pre-Installation';
			}
			else if($case_type=='INS')
			{
				$case_subject = 'Schedule for Installation';
			}
			$account_id = $bean->account_id_c;
			
		    $previous_supervisor_co_id = $bean->fetched_row['user_id1_c'];
			$supervisor_co_id = $bean->user_id1_c;
			$sales_person_id = $bean->user_id_c;
			$opp_id = $bean->opportunity_id_c;
			$service_co_id = $bean->rel_fields_before_value['assigned_user_id'];
			$branch_name = $bean->region_c;
			$case_status = "Open_PLN";
			$case_state = "Open";
			$startDate = time();//$bean->date_start;
			$case_start_date = date('Y-m-d H:i:s', strtotime('+1 day -5 hour -30 minutes', $startDate));
			$date_created = date('Y-m-d H:i:s');//, strtotime('+5 hours +30 minutes', strtotime('now')));
			
			// fetch branch name start
			$get_loginuserbranch = "SELECT `branch_c` FROM `users_cstm` as A inner join `users` as B on A.id_c = B.id WHERE user_name = '$login_username'";
			$branchname = $db->query($get_loginuserbranch);
			$row11 = $db->fetchByAssoc($branchname);
			$fetched_branch_name = trim($row11['branch_c']);
			if($branch_name=='')
			{
				$upd_branch_name = $fetched_branch_name;
			}else{
				$upd_branch_name  = $branch_name;
			}
			// fetch branch name End
				 
			if(empty($previous_supervisor_co_id) && !empty($supervisor_co_id) && in_array($case_type,$meeting_types_arr))
			{
				
				//Guid creation
						$charid = md5(uniqid(rand(),true));
						$hyphen = chr(45);
						$uuid =  substr($charid,0,8).$hyphen.substr($charid,8,4).$hyphen.substr($charid,12,4).$hyphen.substr($charid,16,4).$hyphen.substr($charid,20,12);
				// end of code
					
				$fetch_last_case_number = "SELECT case_number FROM `cases` order by `case_number` desc LIMIT 1";
				$result = $db->query($fetch_last_case_number);
				$row = $db->fetchByAssoc($result);
				$case_number = (!empty($row['case_number'])?$row['case_number']:0);
				if($case_number==0)
				{
					$case_number = $case_number + 1;
				}else{
					$case_number = $case_number + 1;
				}
				
				
				if($case_number!='')
				{
					//echo "created";
					//exit;
					$sql = "INSERT INTO `cases`(`id`, `name`, `date_entered`, `date_modified`, `created_by`, `assigned_user_id`, `case_number`, `type`, `status`,`account_id`, `state`)
					VALUES ('$uuid','$case_subject','$date_created','$date_created','$sales_person_id','$service_co_id',
					'$case_number','Product','$case_status','$account_id','$case_state')";
					$create_case = $db->query($sql);
					
					$sql1 = "INSERT INTO `cases_cstm`(`id_c`, `startdate_c`, `casetype_c`, `user_id_c`,`user_id1_c`,`region_c`) VALUES ('$uuid','$case_start_date','$case_type','$supervisor_co_id','$sales_person_id','$upd_branch_name')";
					$insert_custom_table = $db->query($sql1);
					
					
					//Guid creation
						$charid = md5(uniqid(rand(),true));
						$hyphen = chr(45);
						$uuid2 =  substr($charid,0,8).$hyphen.substr($charid,8,4).$hyphen.substr($charid,12,4).$hyphen.substr($charid,16,4).$hyphen.substr($charid,20,12);
					// end of code
					
					$sql2 = "INSERT INTO `opportunities_cases_1_c`(`id`, `date_modified`, `opportunities_cases_1opportunities_ida`, `opportunities_cases_1cases_idb`) VALUES ('$uuid2','$date_created','$opp_id','$uuid')";
					$insert_relation_table = $db->query($sql2);
					
					//Guid creation
						$charid1 = md5(uniqid(rand(),true));
						$hyphen1 = chr(45);
						$uuid3 =  substr($charid1,0,8).$hyphen1.substr($charid1,8,4).$hyphen1.substr($charid1,12,4).$hyphen1.substr($charid1,16,4).$hyphen1.substr($charid1,20,12);
					// end of code
					
					$sql3 = "INSERT INTO `meetings_cases_1_c`(`id`, `date_modified`, `meetings_cases_1meetings_ida`, `meetings_cases_1cases_idb`) VALUES ('$uuid3','$date_created','$meeting_id','$uuid')";
					$insert_meetings_cases_relation_table = $db->query($sql3);
					
					
					
				}

			}
			else if($previous_supervisor_co_id!=$supervisor_co_id)
				{
					$case_id = $bean->parent_id;
					
					/* $fetch_case_id = "SELECT `meetings_cases_1cases_idb` FROM `meetings_cases_1_c` WHERE `meetings_cases_1meetings_ida`='$meeting_id' and `deleted`=0 limit 1";
					$result11 = $db->query($fetch_case_id);
					$row11 = $db->fetchByAssoc($result11);
					$case_id = $row11['meetings_cases_1cases_idb']; */
					
					if($case_id!='')
					{
						//if suppose sales person has changed the supervisor it should be updated in related case
						$sql4 = "UPDATE `cases_cstm` SET `user_id_c`='$supervisor_co_id' where `id_c`='$case_id'";
						$update_supervisor_id = $db->query($sql4);
					}
					
					
				}

			
			
		}
}
?>
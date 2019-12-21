<?php
/* 
	Created By: Pratik Tambekar
	Description: Created for date validation and customizations of cases module
*/
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.edit.php');
//require_once('modules/Accounts/AccountsListViewSmarty.php');
error_reporting('On');
class CasesViewEdit extends ViewEdit
{
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
		 global $db, $current_user, $sugar_config;
		 $empty=$oppurtunity_related_id=$oppurtunity_related_name='';
		 //echo "<pre>";
		// print_r($this->bean);
		
		  if(empty($this->bean->id)){
			 $empty = '1';
			 if(isset($_REQUEST['relate_id']))
			 {
				 $oppurtunity_related_id = $_REQUEST['relate_id'];
				 $assigned_user_name = $_REQUEST['assigned_user_name'];
				 $assigned_user_id = $_REQUEST['assigned_user_id'];
				 
				 $get_opp_name = "SELECT `name`,`assigned_user_id` FROM `opportunities` WHERE `id`='$oppurtunity_related_id' and `deleted`=0";
				 $response = $db->query($get_opp_name);
				 $row20 = $db->fetchByAssoc($response);
				 $oppurtunity_related_name = (!empty($row20['name'])?$row20['name']:'name not available');
				 $oppurtunity_assigned_id = (!empty($row20['assigned_user_id'])?$row20['assigned_user_id']:'');
				 
				 if(!empty($oppurtunity_assigned_id))
				 {
					 $get_sales_person_name = "SELECT CONCAT(`first_name`, ' ', `last_name`) as firstlast,`last_name` FROM `users` WHERE `id`='$oppurtunity_assigned_id' and deleted=0";
					 $response1 = $db->query($get_sales_person_name);
					 $row21 = $db->fetchByAssoc($response1);
					 $sales_per_name = (!empty($row21['firstlast'])?$row21['firstlast']:'name not available');
					 if($sales_per_name=='name not available')
					 {
						 $sales_per_name = $row21['last_name'];
					 }
				 }
				 
				$get_opp_cust_name="SELECT A.`name`,A.`id` FROM `accounts` as A inner join `accounts_opportunities` as B on A.id =B.account_id where B.opportunity_id='$oppurtunity_related_id' and A.deleted=0 and B.deleted=0";
				 $response2 = $db->query($get_opp_cust_name);
				 $row22 = $db->fetchByAssoc($response2);
				 $account_person_name = (!empty($row22['name'])?$row22['name']:'name not available');
				$customer_id = (!empty($row22['id'])?$row22['id']:'');
				 

			 }
		 
		 } 
		 $case_id = $this->bean->id;
		 $final_random_assigned_user_id = $account_person_id = $serv_coordinate = $sales_coordinate = $accountant_name='';
		 $assigned_keys = array();
		 $assigned_values = array();
		 $final_assigned_user_id = array();
		 //check any documents are uploded related to this case start

		 $get_cases_related_documents = "SELECT count(*) as document_count FROM `documents_cases` WHERE `case_id`='$case_id' and `deleted`=0";
		 $result = $db->query($get_cases_related_documents);
		 $row13 = $db->fetchByAssoc($result);
		 $cases_documents_count = (($row13['document_count']>0)?$row13['document_count']:0);
		 
		 
		  //check any documents are uploded related to this case End
		 $login_username = $current_user->user_name;
		 $get_loginuserbranch = "SELECT `branch_c` FROM `users_cstm` as A inner join `users` as B on A.id_c = B.id WHERE user_name = '$login_username'";
		 $branchname = $db->query($get_loginuserbranch);
		 $row11 = $db->fetchByAssoc($branchname);
		 $branch_name = trim($row11['branch_c']);
		 
		  //maintain log to check branch of login user geeting or not start
					 $APILogFile = 'assigned_account_person.txt';
					 $handle = fopen($APILogFile, 'a');
					 $timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
					 $logMessage8 = "\nassigned_service_coordinator Result at $timestamp :-\n Branch Name: $branch_name";
					 fwrite($handle, $logMessage8);		
					 fclose($handle);
			//End
		 
		 
		 //fetch account handle person name based on branch wise start(assignment is done based on round robin and least assigned
		 if($branch_name!='' && $this->bean->scrm_accountperson_id_c=='')
		 {
			 
			 $get_account_person_name = "SELECT `id`,`first_name`,`last_name` FROM `scrm_accountperson` WHERE `deleted` = 0 and `branch` = '$branch_name' order by `date_entered` desc";
			 //exit;
			 $acc_name = $db->query($get_account_person_name);
			 while($acc_username = $db->fetchByAssoc($acc_name))
			 {
				 $acc_user_id = (!empty($acc_username['id'])?$acc_username['id']:'');
				 if($acc_user_id!='')
				{
					//fetch Active service co-ordinator cases assigned count
					 $get_case_Assigned_count_of_acoountperson = "SELECT count(*) as assigned_count FROM `cases` as A inner join `cases_cstm` as B on A.id=B.id_c  WHERE B.`scrm_accountperson_id_c`='$acc_user_id' and A.deleted=0";
					$result1 = $db->query($get_case_Assigned_count_of_acoountperson);
					$row1 = $db->fetchByAssoc($result1);
					$assigned_count = (!empty($row1['assigned_count'])?$row1['assigned_count']:0);
					$assigned_keys[] = $acc_user_id;   // all service co-ordinator ids
					$assigned_values[] = $assigned_count; // all service co-ordinator case assigned count 
										
				} 
			 }
			 //print_r($assigned_keys);
			 //print_r($assigned_values);
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
							if(isset($final_random_assigned_user_id) && !empty($final_random_assigned_user_id))
							{
								$account_person_id = $final_random_assigned_user_id ;
							}else{
									if(!empty($final_assigned_user_id))
									{
										$account_person_id = $final_assigned_user_id[0];
									}
							}
							
							//****************LOG Creation*********************
								$APILogFile = 'assigned_account_person.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
								//date('Y-m-d H:i:s');
								$logArray = array('final_assigned_user_id'=>$final_assigned_user_id,'branch_name'=>$branch_name,'allValuesAreTheSame'=>$allValuesAreTheSame,'account_person_id'=>$account_person_id);
								$logArray1 = print_r($final_arr, true);
								$logArray2 = print_r($logArray, true);
								$logMessage = "\nassigned_account_person Result at $timestamp :-\n$logArray1";
								$logMessage1 = "\nassigned_account_person Result at $timestamp :-\n$logArray2";
								fwrite($handle, $logMessage);		
								fwrite($handle, $logMessage1);										
								fclose($handle);
								//****************ENd OF Code*****************
							
						$get_accounteam_name = "SELECT `first_name`,`last_name` FROM `scrm_accountperson` WHERE `id`='$account_person_id' and deleted=0";
						$accountusernm = $db->query($get_accounteam_name);
						$username_ofaccteam = $db->fetchByAssoc($accountusernm);
						 if($username_ofaccteam['first_name']!='' && $username_ofaccteam['last_name']!='')
						 {
							 $accountant_name = trim($username_ofaccteam['first_name']." ".$username_ofaccteam['last_name']);
							 
						 }else if($username_ofaccteam['last_name']!=''){
							 $accountant_name = trim($username_ofaccteam['last_name']);
						 }else{
							  $accountant_name = trim($username_ofaccteam['first_name']);
						 }	
						//echo $accountant_name;
				} 
		 }
			
		 //fetch account handle person name based on branch wise End
		
		 //auto Sales co-ordinator assigned based on branch of login user Start
		 if($branch_name!='' && $this->bean->salescoordinator_c=='')
		 {
				 $assigned_keys1 = array();
				 $assigned_values1 = array();
				 $final_assigned_user_id1 = array();
				 $final_random_assigned_user_id1=$sales_coor_id=$sales_coordinate_name='';
				 $get_sales_co_role_id = "SELECT * FROM `acl_roles` WHERE LOWER(`name`)='sales co-ordinator' and `deleted`=0";
				 $roleidofsalesco = $db->query($get_sales_co_role_id);
				 while($salesrole = $db->fetchByAssoc($roleidofsalesco))
				 {
					 $sales_co_role_id = trim($salesrole['id']);
					
						  $get_salesuser_id = "SELECT `user_id` FROM `acl_roles_users` as A inner join `users` as B on A.user_id=B.id inner join `users_cstm` as C on B.id=C.id_C  WHERE `role_id`='$sales_co_role_id' and A.`deleted`=0 and C.branch_c='$branch_name' and B.deleted=0 and B.status='Active'";
						 $salesuserid = $db->query($get_salesuser_id);
						 while($salescouser = $db->fetchByAssoc($salesuserid))
						 {
								$sales_co_user_id = trim($salescouser['user_id']);  // user under sales co-ordinator role
							 
								 $get_salesco_userfullname = "SELECT count(*) as assigned_count FROM `cases` as A inner join `cases_cstm` as CC on A.id=CC.id_C WHERE CC.`user_id2_c`='$sales_co_user_id' and A.deleted=0";
								 $salesusernm = $db->query($get_salesco_userfullname);
								 if ($salesusernm->num_rows >= 1) 
								 {
									
									 $username_ofsalesco = $db->fetchByAssoc($salesusernm);
									 $assigned_count1 = (!empty($username_ofsalesco['assigned_count'])?$username_ofsalesco['assigned_count']:0);
									 $assigned_keys1[] = $sales_co_user_id;   // all sales co-ordinator ids
									 $assigned_values1[] = $assigned_count1; // all sales co-ordinator case assigned count 
								 }
							 
						 }
				 }
				
					if(!empty($assigned_keys1) && !empty($assigned_values1))
					{
											// combine key and value array
											$final_arr1 = array_combine($assigned_keys1, $assigned_values1);
													
											//get all values of array
											$arrval1 = array_values($final_arr1);
													
											// check all values of array are same or not (if all are same then return 1 else blank
											$allValuesAreTheSame1 = (count(array_unique($arrval1)) === 1);
											if($allValuesAreTheSame1==1)
											{
													//if count of all service co-ordinator are same then take any one randomly
													$final_random_assigned_user_id1 = array_rand($final_arr1);
											}else{
								
												//find minimum assigned user(service co-ordinator ) count
												$final_assigned_user_id1 = array_keys($final_arr1, min($final_arr1)); 
											}
											if(isset($final_random_assigned_user_id1) && !empty($final_random_assigned_user_id1))
											{
												$sales_coor_id = $final_random_assigned_user_id1 ;
											}else{
													if(!empty($final_assigned_user_id1))
													{
														$sales_coor_id = $final_assigned_user_id1[0];
													}
											}
											//****************LOG Creation*********************
											$APILogFile = 'assigned_sales_co-ordinator.txt';
											$handle = fopen($APILogFile, 'a');
											$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
											//date('Y-m-d H:i:s');
											$logArray5 = array('final_assigned_user_id1'=>$final_assigned_user_id1,'branch_name'=>$branch_name,'allValuesAreTheSame1'=>$allValuesAreTheSame1,'sales_coor_id'=>$sales_coor_id);
											$logArray3 = print_r($final_arr1, true);
											$logArray4 = print_r($logArray5, true);
											$logMessage3 = "\nassigned_sales_co-ordinator Result at $timestamp :-\n$logArray3";
											$logMessage4 = "\nassigned_sales_co-ordinator Result at $timestamp :-\n$logArray4";
											fwrite($handle, $logMessage3);		
											fwrite($handle, $logMessage4);										
											fclose($handle);
											//****************ENd OF Code*****************
										$get_salescoor_name = "SELECT `first_name`,`last_name` FROM `users` WHERE `id`='$sales_coor_id' and deleted=0";
										$salesusernm = $db->query($get_salescoor_name);
										$username_ofsales = $db->fetchByAssoc($salesusernm);
										 if($username_ofsales['first_name']!='' && $username_ofsales['last_name']!='')
										 {
											 $sales_coordinate_name = trim($username_ofsales['first_name']." ".$username_ofsales['last_name']);
											 
										 }else if($username_ofsales['last_name']!=''){
											 $sales_coordinate_name = trim($username_ofsales['last_name']);
										 }else{
											  $sales_coordinate_name = trim($username_ofsales['first_name']);
										 }	
								
					}				 
		 }
		  //auto Sales co-ordinator assigned based on branch of login user End
		 $flag = 0;
		 $get_start_date = "SELECT `startdate_c` FROM `cases_cstm` WHERE `id_c`='$case_id'";
		 $query = $db->query($get_start_date);
		 $row = $db->fetchByAssoc($query);
		 $case_start_date = explode(" ",$row['startdate_c']);
		 $start_date_c = $case_start_date[0];
		 $sdate_arr = explode("-",$start_date_c);
		// print_r($sdate_arr);
		 if(count($sdate_arr)>1)
		 {
			 $sdate_c = $sdate_arr[2]."-".$sdate_arr[1]."-".$sdate_arr[0];
			
			 if($sdate_c!='')
			 {
				 $flag =1;
			 }
			  
		 }

		  echo $date_validation = <<<DOV
            <script>
			function Datevalidate()
			{
					
					var todayDate = new Date();
					//var dd = todayDate.getDate();
					var dd = ((todayDate.getDate()) < 10 ? '0' : '')+(todayDate.getDate());
					var mm = ((todayDate.getMonth()+1) < 10 ? '0' : '')+(todayDate.getMonth() + 1);
					var yy = todayDate.getFullYear();
					//console.log(dd+' '+mm+' '+yy);
					var tdate = new Date(yy+'-'+mm+'-'+dd).getTime();
					if($("#startdate_c_date").val() != '')
					{
						var ss = $("#startdate_c_date").val().split('-');
						var tdate1 = new Date(ss[2]+'-'+(ss[1])+'-'+ss[0]).getTime();
						//alert(tdate1+" >= "+tdate);
						//alert(tdate);
						//alert(tdate1);
						if(tdate1 > tdate)
						{
							return true;
						}
						else
						{
							alert("Start date should be greater than todays date");
							return false;	
						}
					}
					else
					{
							return false;
					}
			}	
			$(document).ready(function()
			{
				//for new ticket creation assigned oppurtunity auto
				var new_case = '$empty';
				if(new_case=='1')
				{
					$('#opportunities_cases_1_name').val('$oppurtunity_related_name').toString();
				    $('#opportunities_cases_1opportunities_ida').val('$oppurtunity_related_id').toString();
					
					$('#salesperson_c').val('$sales_per_name').toString();
				    $('#user_id1_c').val('$oppurtunity_assigned_id').toString();
					
					$('#account_name').val('$account_person_name').toString();
				    $('#account_id').val('$customer_id').toString();
				}
				//disabled region dropdown
				if($('#region_c').val()=='')
				{
					$('#region_c').val('$branch_name');
					$('#region_c option:not(:selected)').prop('disabled', true);
					//assigned service co-ordinator according to branch wise of login user start
				}else{
					$('#region_c option:not(:selected)').prop('disabled', true);
				}
				   
				   //$('#assigned_user_name').val('$serv_coordinate').toString();
				   //$('#assigned_user_id').val('$user_id').toString();
				   
				   var accnm = '$accountant_name';
				   var accpersonid = '$account_person_id';
				   if(accnm!='' && accpersonid!='')
				   {
					   $('#accountperson_c').val(accnm).toString();
					   $('#scrm_accountperson_id_c').val(accpersonid).toString();
				   }
				   
				   // end
				   var salesco_id = '$sales_coor_id';
				   var salesco_name = '$sales_coordinate_name';
				   //console.log(salesco_id);
				   // console.log(salesco_name);
				   if(salesco_id!='' && salesco_name!='')
				   {
						$('#salescoordinator_c').val(salesco_name).toString();
						$('#user_id2_c').val(salesco_id).toString();
						//based on sales person login branch will get selected auto start
				   }
					// end
					
				    var todayDate1 = new Date();
					//var dd = todayDate1.getDate();
					var dd1 = ((todayDate1.getDate() + 1) < 10 ? '0' : '')+(todayDate1.getDate() + 1);
					var mm1 = ((todayDate1.getMonth()+1) < 10 ? '0' : '')+(todayDate1.getMonth() + 1);
					var yy1 = todayDate1.getFullYear();
					var start_date = dd1+'-'+mm1+'-'+yy1;
					 
					var startDateflag = '$flag';
					if(startDateflag == 1)
					{
						
					}else{
						
						$("#startdate_c_date").val(start_date);
					}
					
			    var case_ID = '$case_id';
                if(case_ID == '')
				{
					//$(".action_buttons").prepend("<span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span>");
					$("input[title='Save']").attr("onclick","var _form = document.getElementById('EditView');_form.action.value='Save'; if(check_form('EditView') && Datevalidate())SUGAR.ajaxUI.submitForm(_form);return false;");
				}
				
				//disbaled close date
				jQuery("#closedate_c_date").prop("disabled", true);
				jQuery("#closedate_c_hours").prop("disabled", true);
				jQuery("#closedate_c_minutes").prop("disabled", true);
				jQuery("#closedate_c_meridiem").prop("disabled", true);
				//jQuery("#container_closedate_c_trigger_c").attr('disabled','disabled').css('opacity',0.5);
				//$( "#container_closedate_c_trigger_c" ).datepicker( "option", "disabled", true );
				
				jQuery("#closedate_c_trigger").hide();
				jQuery("#devsummary_c").hide();
				$('#warehouse_person_c_label').css('visibility','hidden');
				jQuery("#warehouse_person_c").hide();
				jQuery("#btn_warehouse_person_c").hide();
				jQuery("#btn_clr_warehouse_person_c").hide();
				removeFromValidate('EditView','warehouse_person_c');
				$('#devsummary_c_label').css('visibility','hidden');
				
				$("#status,#state").change(function() 
				{ 
					var case_state = $( "#state option:selected" ).text();
					var case_status = $( "#status option:selected" ).text();
					//console.log(case_state+" "+case_status);
					
					if(case_state == 'Closed' && case_status == 'Closed with Deviation')
					{
						jQuery("#devsummary_c").show();
						$('#devsummary_c_label').css('visibility','visible');
						addToValidate('EditView','devsummary_c','varchar',true,'Deviation Summary:');    
                        $('#devsummary_c_label').html('Deviation Summary:<font color="red">*</font>'); 
					}else{
						jQuery("#devsummary_c").hide();
						$('#devsummary_c_label').css('visibility','hidden');
						removeFromValidate('EditView','devsummary_c'); 
						$('#devsummary_c_label font').remove();
												
                      
					}
					
					if(case_state == 'Closed' && case_status == 'Closed- Material Shortage')
					{
						
						$('#warehouse_person_c_label').css('visibility','visible');
						jQuery("#warehouse_person_c").show();
						jQuery("#btn_warehouse_person_c").show();
						jQuery("#btn_clr_warehouse_person_c").show();
						addToValidate('EditView','warehouse_person_c','varchar',true,'Warehouse Person:');    
                        $('#warehouse_person_c_label').html('Warehouse Person:<font color="red">*</font>'); 
					}else{
						
						$('#warehouse_person_c_label').css('visibility','hidden');
						jQuery("#warehouse_person_c").hide();
						jQuery("#btn_warehouse_person_c").hide();
						jQuery("#btn_clr_warehouse_person_c").hide();
						removeFromValidate('EditView','warehouse_person_c'); 
						$('#warehouse_person_c_label font').remove();
					}
					
					
				});
				
				var ischecked = $('#exmatrtn_c').is(":checked");
				if(ischecked)
				{
					$('#cnr_c_label').css('visibility','visible');
					jQuery("#cnr_c").show();
					$('#cnr_c').prop('checked', true);
					
					//on click excess material return show material return description
					$('#materialreturndescription_c_label').css('visibility','visible');
					$("#materialreturndescription_c").show();
					addToValidate('EditView','materialreturndescription_c','varchar',true,'Material return description:');    
                    $('#materialreturndescription_c_label').html('Material return description:<font color="red">*</font>');
				}else{
					$('#cnr_c_label').css('visibility','hidden');
					jQuery("#cnr_c").hide();
					
					//on click excess material return hide material return description
					$('#materialreturndescription_c_label').css('visibility','hidden');
					$("#materialreturndescription_c").hide();
					removeFromValidate('EditView','materialreturndescription_c'); 
					$('#materialreturndescription_c_label font').remove();
				}
				$('#exmatrtn_c').change(function() {
				if(this.checked) {
					$('#cnr_c_label').css('visibility','visible');
					jQuery("#cnr_c").show();
					$('#cnr_c').prop('checked', true);
					
					//on click excess material return show material return description
					$('#materialreturndescription_c_label').css('visibility','visible');
					$("#materialreturndescription_c").show();
					addToValidate('EditView','materialreturndescription_c','varchar',true,'Material return description:');    
                    $('#materialreturndescription_c_label').html('Material return description:<font color="red">*</font>');
					
				}else{
					$('#cnr_c_label').css('visibility','hidden');
					jQuery("#cnr_c").hide();
					
					//on click excess material return hide material return description
					$('#materialreturndescription_c_label').css('visibility','hidden');
					$("#materialreturndescription_c").hide();
					removeFromValidate('EditView','materialreturndescription_c'); 
					$('#materialreturndescription_c_label font').remove();
				}
     
			 });
			
			//When casetype is measurement remove validate for supervisor - Ravi Teja 4/12/2019
			   var case_type = $( "#casetype_c option:selected" ).text();
			   if(case_type == 'Measurement')
				{
					removeFromValidate('EditView','supervisor_c'); 
					$('#supervisor_c_label font').remove();

					addToValidate('EditView','salesperson_c','varchar',true,'Sales Person:');    
                    $('#salesperson_c_label').html('Sales Person:<font color="red">*</font>');
						
					$('#measurementstatus_c_label').css('visibility','hidden');
					$("#measurementstatus_c").hide();
					$('#measurementstatus_c_label font').remove();
					
					// show Documents Uploaded code start
					$('#doc_uploaded_c_label').css('visibility','visible');
					$("#doc_uploaded_c").show();
					addToValidate('EditView','doc_uploaded_c','varchar',true,'Documents Uploaded:');    
                    $('#doc_uploaded_c_label').html('Documents Uploaded:<font color="red">*</font>');
					

				}else{
					addToValidate('EditView','supervisor_c','varchar',true,'Supervisor:');    
                    $('#supervisor_c_label').html('Supervisor:<font color="red">*</font>');
					
					addToValidate('EditView','salesperson_c','varchar',true,'Sales Person:');    
                    $('#salesperson_c_label').html('Sales Person:<font color="red">*</font>');
					 
					$('#measurementstatus_c_label').css('visibility','visible');
					$("#measurementstatus_c").show();
					
					
				}
			   $("#casetype_c").change(function() 
				{
					var case_type = $( "#casetype_c option:selected" ).text();
					if(case_type == 'Measurement')
					{
						removeFromValidate('EditView','supervisor_c'); 
						$('#supervisor_c_label font').remove();
						
						addToValidate('EditView','salesperson_c','varchar',true,'Sales Person:');    
                        $('#salesperson_c_label').html('Sales Person:<font color="red">*</font>');
						
						$('#measurementstatus_c_label').css('visibility','visible');
						jQuery("#measurementstatus_c").show();
						addToValidate('EditView','measurementstatus_c','varchar',true,'Measurement Status:');    
                        $('#measurementstatus_c_label').html('Measurement Status:<font color="red">*</font>');
						
						
						
					}else{
						
						removeFromValidate('EditView','supervisor_c'); 
						$('#supervisor_c_label font').remove();
						
						removeFromValidate('EditView','salesperson_c'); 
						$('#salesperson_c_label font').remove();
						
						
						$('#measurementstatus_c_label').css('visibility','hidden');
						jQuery("#measurementstatus_c").hide();
						removeFromValidate('EditView','measurementstatus_c'); 
						$('#measurementstatus_c_label font').remove();
						
						// hide Documents Uploaded code start
						$('#doc_uploaded_c_label').css('visibility','hidden');
						$("#doc_uploaded_c").hide();
						removeFromValidate('EditView','doc_uploaded_c'); 
						$('#doc_uploaded_c_label font').remove();
						
					}
				});
				
				
					var case_type = $("#casetype_c option:selected").text();
					if(case_type == 'Installation')
					{
						addToValidate('EditView','contractor_c','varchar',true,'Vendor:');    
                        $('#contractor_c_label').html('Vendor:<font color="red">*</font>');
						
						addToValidate('EditView','installers_c','varchar',true,'Installers:');    
                        $('#installers_c_label').html('Installers:<font color="red">*</font>');
						
					}else{
						
						removeFromValidate('EditView','contractor_c'); 
						removeFromValidate('EditView','installers_c');
						$('#contractor_c_label font').remove();
						$('#installers_c_label font').remove();
					}
					
					if(case_type == 'Service')
					{
						//disbale supervisor field start
						 $("#supervisor_c").attr('readonly','readonly');
						 $('#btn_supervisor_c').attr("disabled", true);
						 $('#btn_clr_supervisor_c').attr("disabled", true);
						
						//end
						
						//if case type is service remove supervisor validation start
						removeFromValidate('EditView','supervisor_c'); 
						$('#supervisor_c_label font').remove();
						
						//end
						
						$('#servicetype_c_label').css('visibility','visible');
						$("#servicetype_c").show();
						addToValidate('EditView','servicetype_c','varchar',true,'Service Type:');    
                        $('#servicetype_c_label').html('Service Type:<font color="red">*</font>');
						
						//show issue category and issue sub category
						$('#issuecategory_c_label').css('visibility','visible');
						$("#issuecategory_c").show();
						addToValidate('EditView','issuecategory_c','varchar',true,'Issue Category:');    
                        $('#issuecategory_c_label').html('Issue Category:<font color="red">*</font>');
						
						$('#issuesubcategory_c_label').css('visibility','visible');
						$("#issuesubcategory_c").show();
						addToValidate('EditView','issuesubcategory_c','varchar',true,'Issue Sub-Category:');    
                        $('#issuesubcategory_c_label').html('Issue Sub-Category:<font color="red">*</font>');
						
						
					}else{
						
						$('#servicetype_c_label').css('visibility','hidden');
						$("#servicetype_c").hide();
						removeFromValidate('EditView','servicetype_c'); 
						$('#servicetype_c_label font').remove();
						
						//hide issue category and issue sub category
						$('#issuecategory_c_label').css('visibility','hidden');
						$("#issuecategory_c").hide();
						removeFromValidate('EditView','issuecategory_c'); 
						$('#issuecategory_c_label font').remove();
						
						$('#issuesubcategory_c_label').css('visibility','hidden');
						$("#issuesubcategory_c").hide();
						removeFromValidate('EditView','issuesubcategory_c'); 
						$('#issuesubcategory_c_label font').remove();
						
					}
				$("#casetype_c").change(function() 
				{ 
					var case_type = $("#casetype_c option:selected").text();
					if(case_type == 'Installation')
					{
						addToValidate('EditView','contractor_c','varchar',true,'Vendor:');    
                        $('#contractor_c_label').html('Vendor:<font color="red">*</font>');
						
						addToValidate('EditView','installers_c','varchar',true,'Installers:');    
                        $('#installers_c_label').html('Installers:<font color="red">*</font>');
						
					}else{
						
						removeFromValidate('EditView','contractor_c'); 
						removeFromValidate('EditView','installers_c');
						$('#contractor_c_label font').remove();
						$('#installers_c_label font').remove();
					}
					
					if(case_type == 'Service')
					{
						//disbale supervisor field start
						 $("#supervisor_c").attr('readonly','readonly');
						 $('#btn_supervisor_c').attr("disabled", true);
						 $('#btn_clr_supervisor_c').attr("disabled", true);
						//end
						//if case type is service remove supervisor validation start
						removeFromValidate('EditView','supervisor_c'); 
						$('#supervisor_c_label font').remove();
						
						//end
						
						$('#servicetype_c_label').css('visibility','visible');
						$("#servicetype_c").show();
						addToValidate('EditView','servicetype_c','varchar',true,'Service Type:');    
                        $('#servicetype_c_label').html('Service Type:<font color="red">*</font>');
						
						//show issue category and issue sub category
						$('#issuecategory_c_label').css('visibility','visible');
						$("#issuecategory_c").show();
						addToValidate('EditView','issuecategory_c','varchar',true,'Issue Category:');    
                        $('#issuecategory_c_label').html('Issue Category:<font color="red">*</font>');
						
						$('#issuesubcategory_c_label').css('visibility','visible');
						$("#issuesubcategory_c").show();
						addToValidate('EditView','issuesubcategory_c','varchar',true,'Issue Sub-Category:');    
                        $('#issuesubcategory_c_label').html('Issue Sub-Category:<font color="red">*</font>');
						
						
					}else{
						
						$('#servicetype_c_label').css('visibility','hidden');
						$("#servicetype_c").hide();
						removeFromValidate('EditView','servicetype_c'); 
						$('#servicetype_c_label font').remove();
						
						//hide issue category and issue sub category
						$('#issuecategory_c_label').css('visibility','hidden');
						$("#issuecategory_c").hide();
						removeFromValidate('EditView','issuecategory_c'); 
						$('#issuecategory_c_label font').remove();
						
						$('#issuesubcategory_c_label').css('visibility','hidden');
						$("#issuesubcategory_c").hide();
						removeFromValidate('EditView','issuesubcategory_c'); 
						$('#issuesubcategory_c_label font').remove();
						
					}
					
					
				});
				
				//if documents uploaded is no then ticket should not be closed start
				var documents_uploaded = '$cases_documents_count';
				if(documents_uploaded==0)
				{
					$("#doc_uploaded_c option[value*='yes']").attr('disabled','disabled');
					$('#doc_uploaded_c').val('no');
					$('#state').val('Open');
					$("#state option[value*='Closed']").prop('disabled',true);
					
				}else{
					
					$("#doc_uploaded_c option[value*='no']").attr('disabled','disabled');
					$('#doc_uploaded_c').val('yes');
				}
				
				//if documents uploaded is no then ticket should not be closed End
				
				/* var doc_uploaded = $( "#doc_uploaded_c option:selected" ).text();
				if(doc_uploaded == 'No')
				{
					$("#doc_uploaded_c option[value*='Closed']").prop('disabled',true);
				}
				 $("#doc_uploaded_c,#casetype_c").change(function() 
				{
					var doc_uploaded = $( "#doc_uploaded_c option:selected" ).text();
					var case_type = $( "#casetype_c option:selected" ).text();
					if(doc_uploaded == 'No' && (case_type == 'Measurement' || case_type == 'Pre-Installation Visit' || case_type == 'Installation'))
					{
						$("select option[value*='Closed']").prop('disabled',true);
					}else{
						$("select option[value*='Closed']").prop('disabled',false);
					}
					
					if(case_type == 'Measurement')
					{
						var doc_uploaded = $( "#doc_uploaded_c option:selected" ).text();
						if(doc_uploaded == 'No')
						{
							//$('#state').val('Open');
							//$('#status').val('Open_INPRG');
						}
					}
					
				}); */
				
				//hide status on state closed for case type measurement
				if(case_type == 'Installation')
					{
						// show Excess Material Return code start
						$('#exmatrtn_c_label').css('visibility','visible');
						$("#exmatrtn_c").show();
						//addToValidate('EditView','exmatrtn_c','varchar',true,'Excess Material Return:');    
						//$('#exmatrtn_c_label').html('Excess Material Return:<font color="red">*</font>');
					}else{
						
						// hide Excess Material Return code start
						$('#exmatrtn_c_label').css('visibility','hidden');
						$("#exmatrtn_c").hide();
						//removeFromValidate('EditView','exmatrtn_c'); 
						//$('#exmatrtn_c_label font').remove();
					}
				if(case_type == 'Measurement' || case_type == 'Pre-Installation Visit' || case_type == 'Installation')
					{
						
						// show Documents Uploaded code start
						$('#doc_uploaded_c_label').css('visibility','visible');
						$("#doc_uploaded_c").show();
						addToValidate('EditView','doc_uploaded_c','varchar',true,'Documents Uploaded:');    
						$('#doc_uploaded_c_label').html('Documents Uploaded:<font color="red">*</font>');
					}else{
						
						// hide Documents Uploaded code start
						$('#doc_uploaded_c_label').css('visibility','hidden');
						$("#doc_uploaded_c").hide();
						removeFromValidate('EditView','doc_uploaded_c'); 
						$('#doc_uploaded_c_label font').remove();
					}
				var case_state = $( "#state option:selected" ).text();
			    var case_type = $( "#casetype_c option:selected" ).text();
				if(case_state == 'Closed' && case_type=='Measurement')
					{
						//hide case status 
						$('#status_label').css('visibility','hidden');
						$("#status").hide();
						removeFromValidate('EditView','status'); 
						
					}
				$("#state,#casetype_c").change(function() 
				{
					var case_state = $( "#state option:selected" ).text();
					var case_type = $( "#casetype_c option:selected" ).text();
					if(case_state == 'Closed' && case_type=='Measurement')
					{
						//hide case status 
						$('#status_label').css('visibility','hidden');
						$("#status").hide();
						removeFromValidate('EditView','status'); 
						
					}else{
						
						$('#status_label').css('visibility','visible');
						$("#status").show();
						
						
					}
					if(case_type == 'Measurement' || case_type == 'Pre-Installation Visit' || case_type == 'Installation')
					{
						
						// show Documents Uploaded code start
						$('#doc_uploaded_c_label').css('visibility','visible');
						$("#doc_uploaded_c").show();
						addToValidate('EditView','doc_uploaded_c','varchar',true,'Documents Uploaded:');    
						$('#doc_uploaded_c_label').html('Documents Uploaded:<font color="red">*</font>');
					}else{
						
						// hide Documents Uploaded code start
						$('#doc_uploaded_c_label').css('visibility','hidden');
						$("#doc_uploaded_c").hide();
						removeFromValidate('EditView','doc_uploaded_c'); 
						$('#doc_uploaded_c_label font').remove();
					}
					if(case_type == 'Installation')
					{
						// show Excess Material Return code start
						$('#exmatrtn_c_label').css('visibility','visible');
						$("#exmatrtn_c").show();
						//addToValidate('EditView','exmatrtn_c','varchar',true,'Excess Material Return:');    
						//$('#exmatrtn_c_label').html('Excess Material Return:<font color="red">*</font>');
					}else{
						
						// hide Excess Material Return code start
						$('#exmatrtn_c_label').css('visibility','hidden');
						$("#exmatrtn_c").hide();
						//removeFromValidate('EditView','exmatrtn_c'); 
						//$('#exmatrtn_c_label font').remove();
					}
					
				});
				
				//show Reason of reschedule if Re-schedule is selected any one
				var reason_of_reschedule = $( "#reasonofreschedule_c option:selected" ).text();
				if(reason_of_reschedule=='')
				{
						// hide Reason of reschedule textarea
						$('#reasonforreschedule_c_label').css('visibility','hidden');
						$("#reasonforreschedule_c").hide();
						removeFromValidate('EditView','reasonforreschedule_c'); 
						$('#reasonforreschedule_c_label font').remove();
						
				}
				if(reason_of_reschedule=='Material not available')
				{
					   //show warehouse person
					   $('#warehouse_person_c_label').css('visibility','visible');
						jQuery("#warehouse_person_c").show();
						jQuery("#btn_warehouse_person_c").show();
						jQuery("#btn_clr_warehouse_person_c").show();
						addToValidate('EditView','warehouse_person_c','varchar',true,'Warehouse Person:');    
                        $('#warehouse_person_c_label').html('Warehouse Person:<font color="red">*</font>'); 
					
				}
				$("#reasonofreschedule_c").change(function() 
				{
					var reason_of_reschedule = $( "#reasonofreschedule_c option:selected" ).text();
					if(reason_of_reschedule=='')
					{
						// hide Reason of reschedule textarea
						$('#reasonforreschedule_c_label').css('visibility','hidden');
						$("#reasonforreschedule_c").hide();
						removeFromValidate('EditView','reasonforreschedule_c'); 
						$('#reasonforreschedule_c_label font').remove();
						
					}else{
						// hide Reason of reschedule textarea
						$('#reasonforreschedule_c_label').css('visibility','visible');
						$("#reasonforreschedule_c").show();
						addToValidate('EditView','reasonforreschedule_c','varchar',true,'Reason for Re-schedule:');    
						$('#reasonforreschedule_c_label').html('Reason for Re-schedule:<font color="red">*</font>');
					}
					
					if(reason_of_reschedule=='Material not available')
					{
							//show warehouse person
							$('#warehouse_person_c_label').css('visibility','visible');
						jQuery("#warehouse_person_c").show();
						jQuery("#btn_warehouse_person_c").show();
						jQuery("#btn_clr_warehouse_person_c").show();
						addToValidate('EditView','warehouse_person_c','varchar',true,'Warehouse Person:');    
                        $('#warehouse_person_c_label').html('Warehouse Person:<font color="red">*</font>'); 
						
					}else{
						
						$('#warehouse_person_c_label').css('visibility','hidden');
						jQuery("#warehouse_person_c").hide();
						jQuery("#btn_warehouse_person_c").hide();
						jQuery("#btn_clr_warehouse_person_c").hide();
						removeFromValidate('EditView','warehouse_person_c'); 
						$('#warehouse_person_c_label font').remove();
					}
				});
				
						
}); 				
</script>
DOV;
		parent::display();
 	}

}

?>
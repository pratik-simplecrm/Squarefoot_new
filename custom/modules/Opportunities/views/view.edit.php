<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/en/msa/master_subscription_agreement_11_April_2011.pdf
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2011 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
ini_set('display_errors','off');

class OpportunitiesViewEdit extends ViewEdit {

		function OpportunitiesViewEdit(){
				parent::ViewEdit();
				$this->useForSubpanel = true;
		}
		
		function display() {
				global $app_list_strings;
				global $current_user;       
				$salesstage=$this->bean->sales_stage;
				$json = getJSONobj();
				$prob_array = $json->encode($app_list_strings['sales_probability_dom']);
				$prePopProb = '';
				
				//code written by pratik start (PO Column option - opportunity module)
					$opp_id = $this->bean->id;   // to fetch oppurtunity ID
				//code written by pratik  End (PO Column option - opportunity module)
				
				if(empty($this->bean->id) && empty($_REQUEST['probability'])) {
					 $prePopProb = 'document.getElementsByName(\'sales_stage\')[0].onchange();';
				}


$probability_script=<<<EOQ
		<script>
		$('input[id="name"]').parent().append('<div style="color:green;">Please enter Product Name </div>'); 
		prob_array = $prob_array;
		document.getElementsByName('sales_stage')[0].onchange = function() {
						if(typeof(document.getElementsByName('sales_stage')[0].value) != "undefined" && prob_array[document.getElementsByName('sales_stage')[0].value]
						&& typeof(document.getElementsByName('probability')[0]) != "undefined"
						) {
								document.getElementsByName('probability')[0].value = prob_array[document.getElementsByName('sales_stage')[0].value];
								SUGAR.util.callOnChangeListers(document.getElementsByName('probability')[0]);

						} 
				};
		$prePopProb
		</script>
EOQ;

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
echo $reset_field=<<<PT
					<script>
					$(document).ready(function(){
					$("#upload_documents_c").change(function(){
						
						var opp_id= '$opp_id';
						var remved = $('#filename_old').css('display');
						if (remved != 'none'){
						//console.log(opp_id);
					 	var documents_val = $('#upload_documents_c').val();
							var retVal = confirm("This will delete attached file from server. Do you want to continue?")
							if(retVal === true){
								$.ajax({

									url: 'customAjax.php',
									type: 'GET',
									asyn: false,
									data: {oppid:opp_id},
									success: function (result) {
										//alert(result);
										
										var resObj1 = jQuery.parseJSON(result);
										var response = resObj1.success;
										if(response=='true')
										{   $('#filename_old').hide();
											//$('#Default_Opportunities_Subpanel tr:has(td#filename_label)').hide();

											$('#filename_new').fadeIn('slow');
											var sales_stages = $( "#sales_stage option:selected" ).text();
											if(sales_stages == 'Closed Won')
											{
												addToValidate('EditView','upload_documents_c','varchar',true,'Upload Documents:');    
												$('#upload_documents_c_label').html('Upload Documents: <font color="red">*</font>'); 

												addToValidate('EditView','filename_file','varchar',true,'Opportunity Attachment:');    
												$('#filename_label').html('Opportunity Attachment:<font color="red">*</font>'); 
											}
										}
										
									}
								});
							}
						  }
					 	});
					});

					</script>
PT;
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)

			echo $popup_box= <<<AL

		
			<script>
				$(document).ready(function(){
					//alert("fjdhfkjdk");
					//onclick="SUGAR.field.file.deleteAttachment("filename","",this);";
					$('#remove_button').removeAttr('onclick');
					//alert("removed");

							$('#remove_button').click(function(){

							  	   var opp_id= '$opp_id';
							  	   //console.log(opp_id);
									
					               var retVal = confirm("This will delete file from server. Do you want to continue?");
					               if( retVal === true ) {

					               		$('#remove_button').after('<input type="button" class="button" id="rmv_Button" value="Remove" hidden>');


					               		$('#rmv_Button').attr('onclick','SUGAR.field.file.deleteAttachment("filename","",this);');
										
										$('#rmv_Button').trigger('click');
										
										var sales_stages = $( "#sales_stage option:selected" ).text();
										if(sales_stages == 'Closed Won')
										{
											addToValidate('EditView','upload_documents_c','varchar',true,'Upload Documents:');    
											$('#upload_documents_c_label').html('Upload Documents: <font color="red">*</font>'); 

											addToValidate('EditView','filename_file','varchar',true,'Opportunity Attachment:');    
											$('#filename_label').html('Opportunity Attachment:<font color="red">*</font>'); 
										}
										
								   } 
					                else {
					                 
					                  return false;
					               }
							});


					
				});
			</script>
AL;
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field end (PO Column option - opportunity module)


	
//written by: anjali dated on 08072019 End  (PO Column option - opportunity module)
$sk=<<<EOQ
		<script>
						$(document).ready(function(){

							//written by: anjali dated on 11072019 start
							$('#EditView').attr('enctype','multipart/form-data');

							//written by: anjali dated on 08072019 start
							//alert($('#sales_stage').text());
							var sales_stages = $( "#sales_stage option:selected" ).text();
							var upload_doc_status = $( "#upload_documents_c option:selected").text();
							if(sales_stages != 'Closed Won'){
								
								$('#upload_documents_c_label').hide();
								$('#upload_documents_c').hide();

								$('#Default_Opportunities_Subpanel tr:has(td#filename_label)').hide();

								 removeFromValidate('EditView','filename_file');                        
				  	  			$('#filename_label').html('Opportunity Attachment:');

							}
							else
							{
								 
							   if(upload_doc_status == 'PO Copy' || upload_doc_status == 'Cheque Copy')
							   {
								  
											
											var opptuid= '$opp_id';
											$.ajax({

														url: 'customAjax.php',
														type: 'GET',
														asyn: false,
														data: {opptuid:opptuid},
														success: function (result) {
															//alert(result);
															
															var resObj1 = jQuery.parseJSON(result);
															var response = resObj1.success;
															if(response=='not_blank')
															{
																
																removeFromValidate('EditView','filename_file'); 
																removeFromValidate('EditView','upload_documents_c'); 
																
															}else{
																
																addToValidate('EditView','upload_documents_c','varchar',true,'Upload Documents:');    
																$('#upload_documents_c_label').html('Upload Documents: <font color="red">*</font>'); 

																addToValidate('EditView','filename_file','varchar',true,'Opportunity Attachment:');    
																$('#filename_label').html('Opportunity Attachment:<font color="red">*</font>'); 
																
															}
														
															
														}
													});
								  
											$('#upload_documents_c_label').show();
											$('#upload_documents_c').show();
											$('#Default_Opportunities_Subpanel tr:has(td#filename_label)').show();

							   }
						    }

						 	$('#sales_stage').change(function()
							{
										
										if ($('#sales_stage').val() == 'Closed Won'){
												
											
										$('#upload_documents_c_label').show();
										$('#upload_documents_c').show();

										$('#Default_Opportunities_Subpanel tr:has(td#filename_label)').show();

										addToValidate('EditView','upload_documents_c','varchar',true,'Upload Documents:');    
										 $('#upload_documents_c_label').html('Upload Documents: <font color="red">*</font>'); 

										 addToValidate('EditView','filename_file','varchar',true,'Opportunity Attachment:');    
										 $('#filename_label').html('Opportunity Attachment:<font color="red">*</font>'); 



										}else{
										
														removeFromValidate('EditView','filename_file'); 
														removeFromValidate('EditView','upload_documents_c'); 														
														$('#filename_label').html('Opportunity Attachment:');  

														$('#upload_documents_c_label').hide();
														$('#upload_documents_c').hide();

														$('#Default_Opportunities_Subpanel tr:has(td#filename_label)').hide();
											}
						 		

							 }); 
						 });
		</script>
EOQ;

echo $sk;
//written by: anjali dated on 08072019 End (PO Column option - opportunity module)
				 global $sugar_config;
					 global $db;
					 global $current_user;
					 global $timedate;
					
					$timeDate = new TimeDate();
						
											 
				$id=$this->bean->id;
				$timeDate = new TimeDate();
				$select_query = "SELECT  actual_date_closed_c from opportunities_cstm where id_c = '$id'";
				$select_result = $db->query($select_query);
				$row = $db->fetchByAssoc($select_result);
				$current_date = $row['actual_date_closed_c'];
				
										 
			$localDate = $timeDate->to_display_date_time($current_date, true, true, $current_user);
				
			 
												
			$dateclosed = explode(' ', $localDate); 
			
			
			$currentdat=$dateclosed[0];
		 

				


							 
	 
		 $datetime_var = $timedate->asUser($timedate->getNow(), $current_user);
		 $datetime = explode(' ',$datetime_var);

		 

		$currentdate = $datetime[0];
	 

		
		echo "<script>
				
				$(document).ready(function() {
				//alert('anju');
						var statusVal = $('#sales_stage').val();
						//console.log(statusVal);
						//$('#upload_po_copy_c').hide();
						
						
						
				});
						$('#opportunities_scoring_c').prop('readonly', true);
				
						$('#actual_date_closed_c_label').hide();
						$('#actual_date_closed_c').parent().parent().hide();
						$('#actual_date_closed_c').hide();
						$('#actual_date_closed_c_trigger').hide();
						//$('#actual_date_closed_c_label').parent().hide();
						var sales_stage = $('#sales_stage').val();

						var current_date ='$current_date';
								
						 if(sales_stage == 'Closed Won' && current_date == '')
				        {
						  $('#actual_date_closed_c').val('$currentdate');
					    }
					    else if(sales_stage == 'Closed Won' && current_date != '')
					    {  
						  $('#actual_date_closed_c').val('$currentdat');
						}
					    else
				        {
						  $('#actual_date_closed_c').val('');
						}
				 
				 $('#sales_stage').change(function()
				 {
						 
						var sales_stage = $('#sales_stage').val();
						var current_date ='$current_date';
							
						if(sales_stage == 'Closed Won' && current_date == '')
				        {
						   $('#actual_date_closed_c').val('$currentdate');
						}
					    else if(sales_stage == 'Closed Won' && current_date != '')
						{  
						   $('#actual_date_closed_c').val('$currentdat');
						}
					    else
				        {
						   $('#actual_date_closed_c').val('');
						}
				});
		
</script>";
				//Code to make Sales stage as read only and hide the save button for normal user
				global $current_user,$user_name;
				$user_id=$current_user->id;
				if(!empty($this->where) || is_admin($current_user)) 
				{
						 //dont do anything.
				}
				else{
						 $sales_stage=$this->bean->sales_stage;
						 if($sales_stage =='Closed Won' || $sales_stage =='Closed Lost')
						 {
								$js=<<<EOQ
										<script>
												document.getElementById('sales_stage').disabled =true;
												document.getElementById("SAVE_HEADER").disabled=true;
												document.getElementById("SAVE_FOOTER").disabled=true;
										</script>
EOQ;
						 } 
				}
//end
				
				$sales_stage=$this->bean->sales_stage;
				global $db,$current_user,$sugar_config;
				require_once('include/TimeDate.php');
				
				
				$dateFormat = $current_user->getPreference('datef');    
				$today_date = date('Y-m-d');        
				$newDate = date($dateFormat, strtotime($today_date));
				
				$js1 =<<<EOD
						<script>            
								var newDate ='$newDate';
								$(document).ready(function(){
										$( "#sales_stage" ).change(function() {                         
												var stage = $("#sales_stage").val();                        
												if(stage =='Closed Won' || stage =='Closed Lost')
												{
														$("#closure_date_c").val(newDate);
												}
												else{
														$("#closure_date_c").val('');
												}
										});

								});
						</script>
EOD;

				//Code for checking select customer have any contact By Anurag Tiwari
				$checkContact =<<<CHK
				<script>
				
				$(document).ready(function(){
												if($('#account_name').val())
												{
														var account_id = $('input[name^="account_id"]').val();
														$.ajax({
																						url: 'customerContactCheck.php',
																						type: 'GET',
																						async: false,
																						data: {
																								account_id : account_id,
																						},
																				}).done(function(data){
																						response =data.trim();
																						//~ console.log(response);
																						if(response.length == 0)
																						{   
																								
																								alert("Contact related to Customer is not created. Please create Contact");
																								$('#Opportunities_subpanel_save_button, #Opportunities_subpanel_save_button, #SAVE_HEADER, #SAVE_FOOTER').prop("disabled",true);
																						}
												
																		 });
																		 
														}
																				
												var old_id;
												$('#btn_account_name').click(function(){
												var myVar =  setInterval(function(){
												var account_id = $('input[name^="account_id"]').val();
												if (account_id!='' && account_id !=old_id) {
																				$.ajax({
																						url: 'customerContactCheck.php',
																						type: 'GET',
																						async: false,
																						data: {
																								account_id : account_id,
																						},
																				}).done(function(data){
																						response =data.trim();
																						 console.log(response);
																						if(response.length == 0)
																						{   
																								$('#SAVE_HEADER, #SAVE_FOOTER').prop("disabled",true);
																								alert("Contact related to Customer is not created. Please create Contact");
																						}
												
																		 });
												//  alert(data);
												old_id = account_id;
												clearInterval(myVar);
												// flag = 1;
												}
												}, 500);
												});
								
						});
						

				</script>   
CHK;

//written by pratik on 16072019 start(PO Column option - opportunity module)
echo $replace_link = <<<AKL
<script>
$(document).ready(function(){
	 $('a[href^="index.php?entryPoint=download"]').each(function(){ 
	
	var oldUrl = $(this).attr("href"); // Get current url
	var newUrl = oldUrl.replace("download", "download1"); // Create new url
    $(this).attr("href", newUrl); // Set herf value

	 });
});
</script>
AKL;
//written by pratik on 16072019 End (PO Column option - opportunity module)

//To autopopulate Teams in QuickCreate On Subpanels 
		//START - 29-09-2014  
		//~ $parent_module = $_REQUEST['return_module'];
		//~ $current_user->user_name; 
		//~ $user = $current_user->id; 
		
		//~ $query = "SELECT default_team FROM users 
								//~ WHERE id ='$user' 
								//~ AND deleted =0";
		//~ $res   = $db->query($query);
		//~ $row   = $db->fetchByAssoc($res);
		//~ $default_team = $row['default_team'];
		
		//~ $get_team = " SELECT id,name FROM team where id ='$default_team' AND deleted =0 ";
		//~ $team_res = $db->query($get_team);
		//~ $team_row = $db->fetchByAssoc($team_res);
								
		//~ $id = $team_row['id']; 
		//~ $name = $team_row['name']; 
		//~ $team_id   = trim($id);
		//~ $team_name = trim($name);

		//~ $team =<<<EOD
								//~ <script>
										//~ var team_name = '$team_name';
										//~ var team_id = '$team_id';
										
										//~ $('#form_SubpanelQuickCreate_Opportunities_tabs #team_name').val(team_name);
										//~ $('#form_SubpanelQuickCreate_Opportunities_tabs #team_id').val(team_id);
										
										
								//~ </script>
								
//~ EOD;
				//END 29-09-2014 

				$this->ss->assign('PROBABILITY_SCRIPT', $probability_script);         
				parent::display();
				echo $js; 
				echo $js1; 
				echo $team; 
				echo $checkContact;
		}
}
?>

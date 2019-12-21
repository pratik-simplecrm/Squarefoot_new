<?php
define('sugarEntry', true);
require_once('include/entryPoint.php');

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');
require_once('modules/Administration/Administration.php');
require_once('data/BeanFactory.php');

		$query = "SELECT  id FROM arch_architects_contacts WHERE deleted='0'";
		$result = $GLOBALS['db']->query($query);
		//$row = $GLOBALS['db']->fetchByAssoc($result);
		//$GLOBALS['log']->fatal($query,"Architects");
		while($row = $GLOBALS['db']->fetchByAssoc($result))
		{
			//$architect_bean = BeanFactory::getBean('Arch_Architects_Contacts', $row['id']);
			//~ print_r($architect_bean);
			//~ exit;
			$query_call_info ="SELECT date_start from calls where parent_id='".$row['id']."' and parent_type='Arch_Architects_Contacts' and deleted=0 ORDER BY date_entered desc";
			$call_info_result = $GLOBALS['db']->query($query_call_info);
			$row_call_info = $GLOBALS['db']->fetchByAssoc($call_info_result);
			$call_due_date = $row_call_info['date_start'];
			$call_start_date = strtotime($call_due_date);
			
			$query_meeting_info ="SELECT date_start from meetings where parent_id='".$row['id']."' and parent_type='Arch_Architects_Contacts' and deleted=0 ORDER BY date_entered desc";
			$meeting_info_result = $GLOBALS['db']->query($query_meeting_info);
			$row_meeting_info = $GLOBALS['db']->fetchByAssoc($meeting_info_result);
			$meeting_due_date = $row_meeting_info['date_start'];
			$meeting_start_date = strtotime($meeting_due_date);
			if(!empty($call_start_date) && !empty($meeting_start_date))
			 {
				 
					if($call_start_date > $meeting_start_date)
					{
						$query_update = "update arch_architects_contacts_cstm set last_contacted_date_c = '".$call_due_date."' where id_c = '".$row['id']."'";
						$result_update = $GLOBALS['db']->query($query_update);
					}
					else
					{
						$query_update = "update arch_architects_contacts_cstm set last_contacted_date_c = '".$meeting_due_date."' where id_c = '".$row['id']."'";
						$result_update = $GLOBALS['db']->query($query_update);
						
					}
			}
			else if(empty($call_start_date) && !(empty($meeting_start_date)))
			 {
				 $query_update = "update arch_architects_contacts_cstm set last_contacted_date_c = '".$meeting_due_date."' where id_c = '".$row['id']."'";
						$result_update = $GLOBALS['db']->query($query_update);
			}
			else if(empty($meeting_start_date) && !(empty($call_start_date)))
			{
					$query_update = "update arch_architects_contacts_cstm set last_contacted_date_c = '".$call_due_date."' where id_c = '".$row['id']."'";
						$result_update = $GLOBALS['db']->query($query_update);
			}
			 //$GLOBALS['log']->fatal("inner loop");	
			 //~ $query_update = "update arch_architects_contacts_cstm set last_contacted_date_c = '".date("Y-m-d H:i:s")."' where id_c = '".$row['id']."'";
			 //$result_update = $GLOBALS['db']->query($query_update);
		}
		//$GLOBALS['log']->fatal("outer loop");
return true;
?>

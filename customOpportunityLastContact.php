<?php
	define('sugarEntry', true);
require_once('include/entryPoint.php');

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');
require_once('modules/Administration/Administration.php');	


$query = "SELECT  id,sales_stage FROM opportunities WHERE deleted='0'";
$result = $GLOBALS['db']->query($query);
$row = $GLOBALS['db']->fetchByAssoc($result);
$i = 0;
while($row = $GLOBALS['db']->fetchByAssoc($result))
{
	$type = array('Negotiation/Review','Draft');
	if(in_array($row['sales_stage'],$type))
	{
		$opp_bean = BeanFactory::getBean('Opportunities', $row['id']);
		
		if ($opp_bean->load_relationship('calls'))
		{
			$relatedBeans = $opp_bean->calls->getBeans();
			$calls_due_date = array();
			$today_date = strtotime(date('Y-m-d H:i:s'));
			foreach($relatedBeans as $related_bean)
			{
				if(strtotime($related_bean->date_start) < $today_date)
					$calls_due_date[] = strtotime($related_bean->date_start);
			}
			rsort($calls_due_date);
		}
		
		if ($opp_bean->load_relationship('meetings'))
		{
			$relatedBeans = $opp_bean->meetings->getBeans();
			
			$meeting_due_date = array();
			$today_date = strtotime(date('Y-m-d H:i:s'));
			foreach($relatedBeans as $related_bean)
			{
				if(strtotime($related_bean->date_end) < $today_date)
					$meeting_due_date[] = strtotime($related_bean->date_start);
			}
			rsort($meeting_due_date);
		}
		if ($opp_bean->load_relationship('quote_quote_opportunities'))
		{
			$relatedBeans = $opp_bean->quote_quote_opportunities->getBeans();
			
			$quote_due_date = array();
			$today_date = strtotime(date('Y-m-d H:i:s'));
			foreach($relatedBeans as $related_bean)
			{
					$quote_due_date[] = strtotime($related_bean->date_modified);
			}
			rsort($quote_due_date);
		}
		
		$last_contacted_date = '';
		if(($calls_due_date[0] > $meeting_due_date[0]) && ($calls_due_date[0] > $quote_due_date[0]))
		{
			echo $last_contacted_date = date("Y-m-d H:i:s",$calls_due_date[0]);
		}
		else if(($meeting_due_date[0] > $calls_due_date[0]) && ($meeting_due_date[0] > $quote_due_date[0]))
		{
			echo $last_contacted_date = date("Y-m-d H:i:s",$meeting_due_date[0]);	
		}
		else if(!empty($quote_due_date[0]))
		{
			echo $last_contacted_date = date("Y-m-d H:i:s",$quote_due_date[0]);
		}
		
		
		if(!empty($last_contacted_date))
		{
			$query_update = "update opportunities_cstm set last_contacted_date_c = '$last_contacted_date' where id_c = '$opp_bean->id'";
			$result_update = $GLOBALS['db']->query($query_update);
		}
	}
}
return true;

?>

<?php
	if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');
	class OpportunityNotTouched
	{
		public function opportunity_not_touched_list($bean, $event, $arguments)
		{
			//~ echo '<pre>';
			//~ print_r($bean->last_contacted_date_c);
			// echo "<pre>";
			// print_r($bean);exit;
			$due_date = strtotime(date('Y-m-d').'- 90 days');
			$type = array('Negotiation/Review','Draft');


			
			if($bean->last_contacted_date_c && strtotime($bean->last_contacted_date_c) <= $due_date && in_array($bean->sales_stage, $type))
			{
				$datetime1 = new DateTime($bean->last_contacted_date_c);
				$datetime2 = new DateTime();
				$interval = $datetime1->diff($datetime2);
				$days = $interval->format('%a');
				
				$bean->last_contacted_date_c = '<span id="last_contact_date" style="color:red">'.$bean->last_contacted_date_c .' </span><img border="0" align="absmiddle" alt="Alert" src="themes/default/images/alert.jpeg" width="20px" height="20px" placeholder="Opps not touched over 90 days" title="Opportunity not touched last '.$days.' days">';
			}
			
		}
	}

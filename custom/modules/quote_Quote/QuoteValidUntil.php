<?php
	if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');
	class QuoteValidUntil
	{
		public function quote_valid_until($bean, $event, $arguments)
		{
			//~ echo '<pre>';
			//~ print_r($bean->last_contacted_date_c);
			$today_date = strtotime(date('Y-m-d'));
			//~ $type = array('Negotiation/Review','Draft');
			
			if(strtotime($bean->valid_until_c) < $today_date)
			{
				$datetime1 = new DateTime($bean->valid_until_c);
				$datetime2 = new DateTime();
				$interval = $datetime1->diff($datetime2);
				$days = $interval->format('%a');
				
				$bean->valid_until_c = '<span id="valid_until_c" style="color:red" placeholder="valid until" title="Quote expired before '.$days.' days">'.$bean->valid_until_c .'</span>';
			}
		}
	}

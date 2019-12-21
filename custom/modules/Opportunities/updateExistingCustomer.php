<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');
	
	class UpdateExistingCustomer
	{
		/**
		 * Purpose: if all the opportunities are closed won or closed lost, then update is Existing customer to 1
		 * Author: Mohammad Shakeer
		 * Dated: 18th March 2015
		 */
		public function update_existing_customer_field($bean, $event, $arguments)
		{
			$customer_id = '';
			if($bean->load_relationship('accounts'))
			{
				$cust_beans = $bean->accounts->getBeans();
				foreach($cust_beans as $cust_bean)
				{
					$customer_id = $cust_bean->id;
				}
			}
			
			$customer_bean = BeanFactory::getBean('Accounts', $customer_id);
			
			if($customer_bean->load_relationship('opportunities'))
			{
				$relatedBeans = $customer_bean->opportunities->getBeans();
				$sales_stage = array();
				foreach($relatedBeans as $relate_bean)
				{
					$sales_stage[] = $relate_bean->sales_stage;
				}
				
				$type = array('Closed Won', 'Closed Lost');
				$result = array_diff($sales_stage,$type);
				
				if(empty($result))
				{
					$customer_bean->is_existing_customer_c = 1;
					$customer_bean->update_date_modified = false;
					$customer_bean->save();
				}
				else
				{
					$customer_bean->is_existing_customer_c = 0;
					$customer_bean->update_date_modified = false;
					$customer_bean->save();
				}
			}
			
		}
	}

?>

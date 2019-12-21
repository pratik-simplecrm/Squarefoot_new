<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
class Opportunities_InPopupView extends Opportunity {

   
      function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
   {    //call parent method, specifying for array to be returned
       $ret_array = parent::create_new_list_query($order_by, $where,$filter,$params, $show_deleted,$join_type, $return_array,$parentbean, $singleSelect);

      global $current_user;
      $acc_id = $_SESSION[$current_user->id];
      //extend user popup list query
      $fr = '' ; $wh='';
      if(!empty($acc_id))
      {
          $fr = " JOIN accounts_opportunities as AO ON opportunities.id=AO.opportunity_id ";
          $wh = " AND  AO.account_id='$acc_id'";
      }

		if(!empty($fr) && !empty($wh))
		{
			$ret_array['from']  .= $fr;
			$ret_array['where'] .= $wh;
		}
//~ print_r($ret_array);exit;
           //return array or query string
           if($return_array)
        {
            return $ret_array;
        }
        return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];



   }
    
    
}
?>

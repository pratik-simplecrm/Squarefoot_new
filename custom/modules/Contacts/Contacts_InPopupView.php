<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
class Contacts_InPopupView extends Contact{

   
      function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
   {    //call parent method, specifying for array to be returned
       $ret_array = parent::create_new_list_query($order_by, $where,$filter,$params, $show_deleted,$join_type, true,$parentbean, $singleSelect);

      global $current_user;
      $account_id_sel = $_SESSION[$current_user->id];
      //extend user popup list query
      $fr = '' ; $wh='';
      if(!empty($account_id_sel))
      {
          $fr = " JOIN accounts_contacts as AC ON contacts.id=AC.contact_id ";
          $wh = " AND  AC.account_id='$account_id_sel' AND AC.deleted=0";
      }

		if(!empty($fr) && !empty($wh))
		{
			$ret_array['from']  .= $fr;
			$ret_array['where'] .= $wh;
		}

           //return array or query string
           if($return_array)
        {
            return $ret_array;
        }

        return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];



   }
    
    
}

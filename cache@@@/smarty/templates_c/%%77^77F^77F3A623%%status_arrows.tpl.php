<?php /* Smarty version 2.6.29, created on 2019-12-10 07:24:29
         compiled from include/DetailView/status_arrows.tpl */ ?>
{*
/**
*  @copyright SimpleCRM http://www.simplecrm.com.sg
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
* along with this program; if not, see http://www.gnu.org/licenses
* or write to the Free Software Foundation,Inc., 51 Franklin Street,
* Fifth Floor, Boston, MA 02110-1301  USA
*
* @author SimpleCRM <info@simplecrm.com.sg>
*/

*}
{php}

if($_REQUEST['module']=="Opportunities")
{
	$field="sales_stage";
	
}else if($_REQUEST['module']=="Leads")
{
	$field="status";
	$del_element=array('Recycled');
}else if($_REQUEST['module']=="Cases")
{
	$field="status";
	$del_element=array('Pending Input','Duplicate');
}


		$bean = BeanFactory::getBean($_REQUEST['module']);
		$field_defs[$_REQUEST['module']] = $bean->getFieldDefinitions();
		$bean=$bean->retrieve($_REQUEST['record']);


		if(!empty($field_defs[$_REQUEST['module']][$field]['options']))
		{
		if(count($app_list_strings[$field_defs[$_REQUEST['module']][$field]['options']])>=1)
		{
		$dp_element=$app_list_strings[$field_defs[$_REQUEST['module']][$field]['options']];	
		}else
		{
		$dp_element=$GLOBALS['app_list_strings'][$field_defs[$_REQUEST['module']][$field]['options']];
		}
		foreach($del_element as $val)
		{
		if (($key = array_search($val, $dp_element)) !== false) {
		unset($dp_element[$key]);
		}
		}
		}
		

{/php}

<div class="row">	
    <div class="arrows_wrapper col-sm-12">	
        <div class="arrow-steps clearfix">
            {php}
			
			foreach($dp_element as $drp_opt1=>$drp_opt_val1)
			{
			 $arrow_key[]=$drp_opt1;
			 $arrow_value[]=$drp_opt_val1;
			}

			$key = array_search($bean->$field, $arrow_key);
			$value = array_search($bean->field, $arrow_value);

			$i=0;

			foreach($dp_element as $drp_opt=>$drp_opt_val)
			{
			
			if(!empty(trim($drp_opt)))
			{
			if($_REQUEST['module']=="Opportunities")
			{
			if($bean->$field !="Closed Lost")
			{
			if($i<=$key || $i<=$value )
			{
		//	echo $drp_opt."==".$drp_opt_val;
			if($drp_opt!="Closed Lost")
			{

			if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
			{
			if($bean->$field=="Closed Won" )
			{
			$current_arrows="current_arrows";
			}else
			{
			$current_arrows="current_arrows_blue";
			}
			}else
			{
			$current_arrows="current_arrows";
			}
			}
                      
                   	echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
			unset($current_arrows);
                        
			}else   if($drp_opt!="Closed Lost")
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			}else
			{
			if($drp_opt_val=="Closed Lost" || $drp_opt=="Closed Lost")
			{
			if($i==$key || $i==$value)
			{
			echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
			}
			}else if($drp_opt_val!="Closed Won")
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			
			}
			}
			else if($_REQUEST['module']=="Leads")
{


			if($bean->$field !="Dead")
			{
			if($i<=$key || $i<=$value )
			{
		
			if($drp_opt!="Dead")
			{
			if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
			{
			if($bean->$field=="Converted" || $bean->$field=="Cavassed")
			{
			$current_arrows="current_arrows";
			}else
			{
			$current_arrows="current_arrows_blue";
			}
			}else
			{
			$current_arrows="current_arrows";
			}
			}
                        if($drp_opt!="Dead"){
        		echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
			unset($current_arrows);
                        }
			}else
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			}else
			{
			if($drp_opt_val=="Dead" || $drp_opt=="Dead")
			{
			if($i==$key || $i==$value)
			{
			echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
			}
			}else if($drp_opt!="Converted")
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			
			}
			

}else if($_REQUEST['module']=="Cases")
{

			$arr_no=array('Closed_Rejected');
			if(!in_array($bean->$field,$arr_no))
			{
			if($i<=$key || $i<=$value )
			{
		
			if(!in_array($drp_opt,$arr_no))
			{
			if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
			{
			if($bean->$field=="Closed_Closed")
			{
			$current_arrows="current_arrows";
			}else
			{
			$current_arrows="current_arrows_blue";
			}
			}else
			{
			$current_arrows="current_arrows";
			}
			}
			echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
			unset($current_arrows);
			}else
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			}else
			{

			if(in_array($drp_opt,$arr_no))
			{
			if($i==$key || $i==$value)
			{
			echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
			}
			else
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			}else
			{
			echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
			}
			
			}
			

}
			}
			
			
			
			$i++;
			}

            {/php}
        </div>

    </div>
</div>
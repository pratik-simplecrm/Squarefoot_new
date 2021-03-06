<?php
//ini_set('display_errors','On');
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class CasesViewDetail extends ViewDetail {


 	function CasesViewDetail(){
 		parent::ViewDetail();
 	}

 	function display(){
				
		if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}

		$this->dv->process();
		global $mod_strings, $sugar_config;
		global $db;
	     //echo "<pre>";
		// print_r($this->bean);
		// exit;
		//show installtion completed date on cases details view for case type service date:23/12/2019 -pratik-start
		$case_type = $this->bean->casetype_c;
		$opportunity_id = $this->bean->opportunities_cases_1opportunities_ida;
		if($case_type=='SRV' && !empty($opportunity_id))
		{
		
			$get_installtion_completed_date = "SELECT `acyualcloseddate_c` FROM `opportunities` as A inner join `opportunities_cstm` as B on A.id = B.id_c where deleted=0 and id_c = '$opportunity_id'";
			$INS_date = $db->query($get_installtion_completed_date);
			$row13 = $db->fetchByAssoc($INS_date);
			$closed_date = $row13['acyualcloseddate_c'];
			$completed_date = (!empty($closed_date)?$closed_date:"not_completed");
			if($completed_date!='not_completed')
			{
				$date_closedd = date("Y-m-d H:i:s",strtotime('+5 hours +30 minutes', strtotime($completed_date)));
			    $date = explode(" ",$date_closedd);
				$timestamp = strtotime($date[0]);
				//$endtime_in_24_hour_format  = date("H:i", strtotime($date[1]));
			    $newDateTime = date('h:i A', strtotime($date_closedd));
				$new_date = date("d-m-Y", $timestamp)." ".$newDateTime;
				//$html = '<div class="col-sm-6 install_completed_12" >Installation Completed Date:</div><span class="install_completed_13">'.$new_date.'</span>';
				$html = '<div class="col-sm-12">';
				$html .= '<div class="col-sm-6" width="50%" scope="col" style="text-align:left;word-wrap: break-word; 		padding-top:10px;padding-left:5px;padding-bottom:5px;">';
				$html .= '<span class="install_completed_12" style="font-weight:600">Installation Completed Date:</span>';
				$html .='<div class="" type="text" field="resolution" colspan="3" style="font-size:14px;word-wrap: break-word;">';
				$html .= '<span class="sugar_field" id="resolution"></span>';
				$html .= '</div></div>';
				$html .= '<div class="col-sm-6" width="50%" scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;">';
				$html .= '<span style="font-weight:600">&nbsp;'.$new_date.'</span>';
				$html .= '<div class="" type="" field="" style="font-size:14px;word-wrap: break-word;"></div></div></div>';
				//echo $html;
			}
		}
		//end
        $record_id = $this->bean->id;
        $baseUrl   = $sugar_config['site_url'] . '/index.php';
        //~ echo $html = trim(from_html($this->bean->description));
          //~ $tiny = new SugarTinyMCE();
        //~ echo $tiny->getInstance('update_text,description', 'email_compose_light');
        /******************Added by Noresha******************************/
		/******************START - Dependency on Category************************/
		echo $js=<<<dependency
		<script>
			$(document).ready(function(){
				var category = $('#type').val();
				if(category == 'Minor_Defect'){
					$('#type1_c').parent().parent().show();
				}else{
					$('#type1_c').parent().parent().hide();
				}

				//Hide progress bar options with class=step by Ravi Teja 4/12/2019
				$('div[class="step "]').each(function(){
				    $(this).css('visibility','hidden');
				    $(this).html().replace("Closed without Deviation", "Closed");
				});
				var case_type = '$case_type';
				if(case_type=='SRV')
				{
					//alert('fff');
					$("#LBL_CASE_INFORMATION > div:nth-child(3)").after('$html');
					
					
				}
			});
		</script>
dependency;

echo $csss=<<<MYSTYLE
<style>
.install_completed_12{
    font-size: 12px;
    font-weight: 600;
    color: red;
}
.install_completed_13{
	
	font-size: 12px;
    font-weight: 600;
    color: black;
}
</style>
MYSTYLE;

		/******************END - Dependency on Category************************/
	parent::display();
 	}
}

?>

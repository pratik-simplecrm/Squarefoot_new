<?php

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
 
	/** 
	  * Facebook webhook file, recieve lead id of newly created lead from Facebook.
	  * Date    : Mar-07-2017
	  * Author  : Nitheesh.R <nitheesh@simplecrm.com.sg> 
	  * Facebook api version : 2.8
	*/

	$challenge    = $_REQUEST['hub_challenge'];
	$verify_token = $_REQUEST['hub_verify_token'];
	
	include 'config.php';
	include 'config_override.php';
	$fb_verify_token = $sugar_config['facebook_campaign_webhook_secret_code']; // Secret code which is given while adding web hook service for Facebook campaign integration in developers.facebook.com

	if ($verify_token == $fb_verify_token) {
		echo $challenge;
	}

	// get the raw POST data
	$rawData     = file_get_contents("php://input");
	$rawData     = preg_replace('/": ([0-9]+),/', '": "$1",', $rawData);
	$final_array = json_decode($rawData, true);

	if(count($final_array) > 0){

		$arr_entry  = $final_array['entry'];

		if(count($arr_entry) > 0){

			for($k=0;$k<count($arr_entry);$k++){

				$arr_entry_each =  $arr_entry[$k];

				if(count($arr_entry_each) > 0){  

					$arr_changes = $arr_entry_each['changes'];
					$object_id   = $arr_entry_each['id'];
					$time        = $arr_entry_each['time'];

					if(count($arr_changes) > 0){ 


						for($m=0;$m<count($arr_changes);$m++){

							$arr_changes_each = $arr_changes[$m];   

							$field       = $arr_changes_each['field'];
							$arr_value   = $arr_changes_each['value'];

							if($field == 'leadgen' ){

								$ad_id           = $arr_value['ad_id'];
								$form_id         = $arr_value['form_id'];
								$leadgen_id      = $arr_value['leadgen_id'];
								$created_time    = $arr_value['created_time'];
								$page_id         = $arr_value['page_id'];
								$adgroup_id      = $arr_value['adgroup_id'];
                        
							}

						}  

					}

				}

			}

		}

		$arr_object = $final_array['object']; //page
	}

	$site_url = "";
	include 'config.php';
	include 'config_override.php';
	$site_url       = $sugar_config['site_url'];
	$last_character = substr($site_url, -1); // returns last character
	if ($last_character == '/') {
		$site_url = substr($site_url, 0, -1); //remove last character same as substr_replace($string, "", -1)
	}

	$url = $site_url."/fbleadcreation.php?origin=crm&leadgen_id=$leadgen_id";

	$ch  = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	$response = curl_exec($ch);
	curl_close($ch);

?>

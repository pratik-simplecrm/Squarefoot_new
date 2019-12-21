<?php
     // fb log

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
	  * Lead creation file, receive lead id from webhook file, 
	  * make proper FB API calls to retrieve leads and campaigns data.
	  * Date    : Mar-07-2017
	  * Author  : Nitheesh.R <nitheesh@simplecrm.com.sg> 
	  * Facebook api version : 2.8
	*/

	$leadgen_id    = $_REQUEST['leadgen_id'];

				$text = $leadgen_id . "first line";
				$myText = (string)$text;
				$myText = $myText."\n";
				$filename = "facebook/fbcampaignlog.txt";
				$fh = fopen($filename, "a");
				fwrite($fh, $myText);
				fclose($fh);


	if(!defined('sugarEntry')) define('sugarEntry', true);
	require_once('include/entryPoint.php');

	doFacebookIntegratoin($leadgen_id);

	function doFacebookIntegratoin($leadgen_id){

		$first_name    = "";
		$last_name     = "";
		$phone_number  = "";
		$email         = "";
		$campaign_id   = "";
		$campaign_name = "";
		$adset_id      = "";
		$adset_name    = "";
		$ad_id         = "";
		$ad_name       = "";
		$created_time  = "";

		global $sugar_config;
		$access_token = $sugar_config['facebook_campaign_webhook_secret_code'];

				$text = $access_token;
				$myText = (string)$text;
				$myText = $myText."\n";
				$filename = "facebook/fbcampaignlog.txt";
				$fh = fopen($filename, "a");
				fwrite($fh, $myText);
				fclose($fh);

		// Get Lead Data
		try {
			$lead_details       = "https://graph.facebook.com/".$leadgen_id."?method=GET&access_token=" .$access_token;
	        $response = curl_get_file_contents($lead_details);
	        $response = json_decode($response);
		} catch (Exception $e) {
		    //echo 'Caught Exception: ',  $e->getMessage(), "\n";

			// fb log
			$text = "fb_campaign error occurred while retrieving lead details : ".$e->getMessage();
			$myText = (string)$text;
			$myText = $myText."\n";
			$filename = "facebook/fbcampaignlog.txt";
			$fh = fopen($filename, "a");
			fwrite($fh, $myText);
			fclose($fh);
		}

		$nameValueList = array();


	    if ($response->error) {
	        // check to see if this is an oAuth error:
	        if ($response->error->type == "OAuthException") {
	            // In valid access token

		        // fb log
				$text = "In valid access token";
				$myText = (string)$text;
				$myText = $myText."\n";
				$filename = "facebook/fbcampaignlog.txt";
				$fh = fopen($filename, "a");
				fwrite($fh, $myText);
				fclose($fh);

	            // Add logic to trigger an email to the Facebook account user to re-authenticate the integration.

	        }
	        else {
	            // Other error has happened

	            // fb log
				$text = "Other error has happened";
				$myText = (string)$text;
				$myText = $myText."\n";
				$filename = "facebook/fbcampaignlog.txt";
				$fh = fopen($filename, "a");
				fwrite($fh, $myText);
				fclose($fh);
	        }
	    } 
	    else {
	            // success
		        if(count($response) > 0){

				$arr_field_data  = $response->field_data;

				if(count($arr_field_data) > 0){

					for($f=0;$f<count($arr_field_data);$f++){

						$arr_field_data_each =  $arr_field_data[$f];

						if(count($arr_field_data_each) > 0){  

							$name         = $arr_field_data_each->name;
							$arr_values   = $arr_field_data_each->values;

							if(count($arr_values) > 0){ 

								$value = $arr_values[0];
								$nameValueList[] = array("name" => $name, "value" => $value);

								if ($name == 'first_name') {
									$first_name = $value;
								}if ($name == 'last_name') {
									$last_name = $value;
								}if ($name == 'phone_number') {
									$phone_number = $value;
								}if ($name == 'full_name') {
									$last_name = $value;
								}if ($name == 'email') {
									$email = $value;
								}

							}

						}

					}

				}

				$created_time = $response->created_time;
				$id           = $response->id;

			}

			// Get Campaign Data
			try {
				$campaign_details            = "https://graph.facebook.com/".$leadgen_id."?method=GET&fields=ad_id,campaign_id,adset_id,campaign_name,ad_name,adset_name,created_time&access_token=" .$access_token;
				$campaign_response           = file_get_contents($campaign_details);
				$campaign_response           = json_decode($campaign_response);
			} catch (Exception $e) {

				// fb log
				$text = "ffb_campaign error occurred while retrieving campaign details : ".$e->getMessage();
				$myText = (string)$text;
				$myText = $myText."\n";
				$filename = "facebook/fbcampaignlog.txt";
				$fh = fopen($filename, "a");
				fwrite($fh, $myText);
				fclose($fh);
			}

			if(count($campaign_response) > 0){

				$campaign_id   = $campaign_response->campaign_id;
				$campaign_name = $campaign_response->campaign_name;
				$adset_id      = $campaign_response->adset_id;
				$adset_name    = $campaign_response->adset_name;
				$ad_id         = $campaign_response->ad_id;
				$ad_name       = $campaign_response->ad_name;
				$created_time  = $campaign_response->created_time;

			}

			$assigned_agent_id = "1";

			// Remove country code from mobile number
			/*			
			if($phone_number[0] == '+'){
				$phone_number = substr($phone_number,3);
			}
			*/

			// Save lead data
			$lead = new Lead();
			$lead->first_name               = $first_name;
			$lead->last_name                = $last_name;
			$lead->lead_source              = "Facebook";
			$lead->description              = "Facebook Campaign Lead.";
			$lead->assigned_user_id         = (!empty($assigned_agent_id) ? $assigned_agent_id : "1");
			$lead->status                   = "New";
			$lead->email1                   = $email;
			$lead->phone_mobile             = $phone_number;
			$lead->facebook_campaign_name_c = $campaign_name;
			$lead->facebook_campaign_id_c   = $campaign_id;
			$lead->save();
	        
	    }

	}


	//note this wrapper function exists in order to circumvent PHP’s 
	//strict obeying of HTTP error codes.  In this case, Facebook 
	//returns error code 400 which PHP obeys and wipes out 
	//the response.
	function curl_get_file_contents($URL) {
		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $URL);
		curl_setopt($c,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($c,CURLOPT_SSL_VERIFYHOST,false);
		$contents = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		if ($contents) return $contents;
		else return FALSE;
	}

?>


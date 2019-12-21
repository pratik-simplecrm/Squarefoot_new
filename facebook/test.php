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

      /*
      * Test file,to check Facebook integration
      * Date    : Mar-08-2018
      * Author  : Vivek Gaidhane <vivek@simplecrm.com.sg> 
      * Facebook api version : 2.12
      * PHP version : 5.6
      */

    include '../config.php';
    include '../config_override.php';

    $site_url                    = '';
    $facebook_page_access_token  = '';
    $app_id                      = '';
    $app_secret                  = '';
    $page_name                   = '';
    $page_id                     = '';

    $site_url                    = $sugar_config['site_url'];
    $facebook_page_access_token  = $sugar_config['facebook_page_access_token'];
    $app_id                      = $sugar_config['facebook_app_id'];
    $app_secret                  = $sugar_config['facebook_secret_id'];
    $page_name                   = $sugar_config['facebook_page_name'];
    $page_id                     = $sugar_config['facebook_page_id'];

    if (empty($site_url)) {
        echo "site_url is missing.Please check the config file."."<br />";
    }
    else if (empty($facebook_page_access_token)) {
        echo "Facebook facebook_page_access_token is missing.Please check the config file."."<br />";
    }
    else if (empty($app_id)) {
        echo "Facebook app_id is missing.Please check the config file."."<br />";
    }
   else if (empty($app_secret)) {
        echo "Facebook app_secret is missing.Please check the config file."."<br />";
    }
    else if (empty($page_name)) {
        echo "Facebook page_name is missing.Please check the config file."."<br />";
    }
    else if (empty($page_id)) {
        echo "Facebook page_id is missing.Please check the config file."."<br />";
    }else{
	    echo "Everything is working smoothly";
    }
  
    // Check fb access token validity.
    try {
        $graph_url = "https://graph.facebook.com/me?"
        . "access_token=" . $facebook_page_access_token;
        $response = curl_get_file_contents($graph_url);
        $decoded_response = json_decode($response);
    } catch (Exception $e) {
      echo 'Caught Exception: ',  $e->getMessage(), "\n";
    }

    // Check for errors 
    if ($decoded_response->error) {
        // check to see if this is an oAuth error:
        if ($decoded_response->error->type == "OAuthException") {
            // Invalid access token
            echo "<br>Access token status : In valid access token"."<br><br>"."Error message : ".$decoded_response->error->message."<br><br>";

            $last_character     = substr($site_url, -1); // returns last character
            if ($last_character == '/') {
                $site_url = substr($site_url, 0, -1); //remove last character same as substr_replace($string, "", -1)
            }

            $fbauthentication_link = $site_url."/fbauthentication.php";

            echo "Re-authenticate Facebook from here : "."<a href='".$fbauthentication_link."' target='_blank'>Facebook Authetication</a>";

        }
        else {
            echo "<br>Other error has happened"."<br>"."Error message : ".$decoded_response->error->message;
        }
    } 
    else {
        // success
        echo "<br>Access token status : Valid Access token";
    }


   // note this wrapper function exists in order to circumvent PHP’s 
  //strict obeying of HTTP error codes.  In this case, Facebook 
  //returns error code 400 which PHP obeys and wipes out 
  //the response.
  function curl_get_file_contents($URL) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $URL);
    $contents = curl_exec($c);
    $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
    curl_close($c);
    if ($contents) return $contents;
    else return FALSE;
  }  
?>

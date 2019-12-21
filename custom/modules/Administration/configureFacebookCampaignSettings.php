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
	* Used for creating administrator link for Facebook campaign settings.
	* Date        : Mar-17-2017
	* Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
	* PHP version : 5.6
	*/
	require_once('config.php');
	global $sugar_config;
	global $sugar_version;

?>

<link rel="stylesheet" type="text/css" href="custom/include/css/fb_campaign_connector.css">

<div class="col-md-6">
   <form id="update-settings" method="post" action="index.php?module=Administration&action=configureFacebookCampaignSettings">
	  <table id="fbb_tbl" class="table table_style">

		<thead>
		 <tr><th colspan="2" class="heading_style"> <img width="20" height="20" src="themes/SuiteR/images/facebook_home.png"><label class="label_margin"> Facebook Campaign Configuration </label> </th></tr>
		 </thead>
		 <tbody>

			<?php if($_GET['success']){?>
				<tr><td colspan="2"><p id="message" type="text" name="message" class="saved_success">Facebook campaign settings updated successfully.</p></td></tr>

			<?php 
				}
			?>

<tr><td><label class="label_element">Page ID </label></td><td><input class="tbl_td_input form-control" id="page_id" type="text" name="page_id" value="<?php echo $sugar_config['facebook_campaign_page_id'];?>"></td></tr>

<tr><td><label class="label_element" >Page Name </label></td><td><input class="tbl_td_input form-control" id="page_name" type="text" name="page_name" value="<?php echo $sugar_config['facebook_campaign_page_name'];?>"></td></tr>

<tr><td><label class="label_element" >App ID </label></td><td><input class="tbl_td_input form-control" id="app_id" type="text" name="app_id" value="<?php echo $sugar_config['facebook_campaign_app_id'];?>"></td></tr>

<tr><td><label class="label_element">Secret ID </label></td><td><input class="tbl_td_input form-control" id="secret_id" type="text" name="secret_id" value="<?php echo $sugar_config['facebook_campaign_secret_id'];?>"></td></tr>
		
<tr><td><label class="label_element">Concerned person's email </label></td><td><input class="tbl_td_input form-control" id="concerned_person_email" type="text" name="concerned_person_email" value="<?php echo $sugar_config['facebook_campaign_concerned_person_email'];?>"></td></tr>

<tr><td><label class="label_element">Facebook webhook secret code </label></td><td><input class="tbl_td_input form-control" id="webhook_secret_code" type="text" name="webhook_secret_code" value="<?php echo $sugar_config['facebook_campaign_webhook_secret_code'];?>"></td></tr>

<td colspan="2" class="td_custom_style">
<a href="index.php?module=Administration&action=index" class="link_custom_style">
<input type="button"  value="Cancel" class="cancel_custom_style" > </a>  <input type="submit"  value="Update" class="submit_custom_style"></td>
		</tr>
		</tbody>
	  </table>
	</form>
</div>


<?php 

if (!empty($_POST['page_id'])) {
	
require_once 'modules/Configurator/Configurator.php';
$configurator = new Configurator();
$configurator->loadConfig(); // it will load existing configuration in config variable of object

$configurator->config['facebook_campaign_page_id']                  = $_POST['page_id'];
$configurator->config['facebook_campaign_page_name']                = $_POST['page_name'];
$configurator->config['facebook_campaign_app_id']                   = $_POST['app_id'];
$configurator->config['facebook_campaign_secret_id']                = $_POST['secret_id'];
$configurator->config['facebook_campaign_concerned_person_email']   = $_POST['concerned_person_email'];
$configurator->config['facebook_campaign_webhook_secret_code']      = $_POST['webhook_secret_code'];

$configurator->saveConfig(); // save changes
// header("Location: index.php?module=Administration&action=configureFacebookCampaignSettings&success=true"); 
// header("Location: index.php?module=Administration&action=index&success=true"); 
?>

<script type="text/javascript">
	   alert('Facebook campaign settings updated successfully.');
	   window.location.href = "index.php?module=Administration&action=index&success=true";
</script>

<?php
}
?>

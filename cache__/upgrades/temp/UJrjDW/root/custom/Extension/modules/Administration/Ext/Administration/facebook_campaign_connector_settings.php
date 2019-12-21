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
// initialize a temp array that will hold the options we want to create
$links = array();
global $sugar_config;
// add button1 to $links
$links['Administration']['config_facebook_campaign_settings'] = array(
 
    // pick an image from /themes/Sugar5/images
    // and drop the file extension
    'facebook',
 
    // title of the link 
    'LBL_FACEBOOK_CAMPAIGN_CONNECTOR_TITLE',
 
    // description for the link
    'LBL_FACEBOOK_CAMPAIGN_CONNECTOR_DESCRIPTION',
 
    // where to send the user when the link is clicked
    './index.php?module=Administration&action=configureFacebookCampaignSettings',
 
);
 

// add our new admin section to the main admin_group_header array
$admin_group_header []= array(
 
    // The title for the group of links
    'LBL_FACEBOOK_CAMPAIGN_CONNECTOR_LINKS_TITLE', 
 
    // leave empty, it's used for something in /include/utils/layout_utils.php 
    // in the get_module_title() function
    '', 
 
    // set to false, it's used for something in /include/utils/layout_utils.php 
    // in the get_module_title() function
    false, 
 
    // the array of links that you created above
    // to be placed in this section
    $links, 
 
    // a description for what this section is about
    'LBL_FACEBOOK_CAMPAIGN_CONNECTOR_LINKS_DESCRIPTION'
 
);

?>
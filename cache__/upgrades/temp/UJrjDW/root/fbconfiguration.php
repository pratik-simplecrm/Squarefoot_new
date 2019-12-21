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
      * Facebook integration configuration file to create required custom fields.
      * Date    : Mar-17-2017
      * Author  : Nitheesh.R <nitheesh@simplecrm.com.sg> 
      * Facebook api version : 2.8
      * PHP version : 5.6
      */

	if(!defined('sugarEntry')) define('sugarEntry', true);
	require_once('include/entryPoint.php');

	/*********************** Create fields - start ***********************/

    $fields = array (

        /*********************** Leads - start ***********************/

        array(
            'name' => 'facebook_campaign_name_c',
            'label' => 'LBL_FACEBOOK_CAMPAIGN_NAME_C',
            'type' => 'varchar',
            'module' => 'Leads',
            'help' => '',
            'comment' => '',
            'default_value' => '', 
            'max_size' => 255,
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

        array(
            'name' => 'facebook_campaign_id_c',
            'label' => 'LBL_FACEBOOK_CAMPAIGN_ID_C',
            'type' => 'varchar',
            'module' => 'Leads',
            'help' => '',
            'comment' => '',
            'default_value' => '', 
            'max_size' => 255,
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

        /*********************** Leads - end ***********************/

    );

    require_once('ModuleInstall/ModuleInstaller.php');
    $moduleInstaller = new ModuleInstaller();
    $moduleInstaller->install_custom_fields($fields);

    /*********************** Create fields - end ***********************/

    echo "Success.";

?>
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
      * Configuration File for Facebook listener plugin, create required parameters, fields etc.
      * Date        : Mar-17-2017
      * Author      : Nitheesh.R <nitheesh@simplecrm.com.sg>
      * PHP version : 5.6
      */

	if(!defined('sugarEntry')) define('sugarEntry', true);
	require_once('include/entryPoint.php');

    // Create required drop down list.
	// load needed libraries
	require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
	require_once('modules/ModuleBuilder/parsers/parser.dropdown.php');

    // create case_sources_list drop down list
	$parser = new ParserDropDown();
	$params = array();
	$_REQUEST['view_package'] = 'studio'; // need this in parser.dropdown.php
	$params['view_package'] = 'studio';
	$params['dropdown_name'] = 'case_sources_list'; // replace with the dropdown name
	$params['dropdown_lang'] = 'en_us'; // create your list...substitute with db query as needed
	$drop_list[] = array('-blank-','');
	$drop_list[] = array('Facebook','Facebook');
	$drop_list[] = array('Twitter','Twitter');
	$json = getJSONobj();
	$params['list_value'] = $json->encode( $drop_list );
	$parser->saveDropDown($params);


	/*********************** Create fields - start ***********************/

    $fields = array (

		/*********************** Leads - start ***********************/

        array(
            'name' => 'posted_message_id_c',
            'label' => 'LBL_POSTED_MESSAGE_ID_C',
            'type' => 'varchar',
            'module' => 'Leads',
            'help' => '',
            'comment' => '',
            'default_value' => '0',
            'max_size' => 255,
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

        array(
            'name' => 'post_from_id_c',
            'label' => 'LBL_POST_FROM_ID_C',
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

		/*********************** Cases - start ***********************/

        array(
            'name' => 'posted_message_id_c',
            'label' => 'LBL_POSTED_MESSAGE_ID_C',
            'type' => 'varchar',
            'module' => 'Cases',
            'help' => '',
            'comment' => '',
            'default_value' => '0',
            'max_size' => 255,
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

        array(
            'name' => 'post_from_id_c',
            'label' => 'LBL_POST_FROM_ID_C',
            'type' => 'varchar',
            'module' => 'Cases',
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
            'name' => 'post_from_first_name_c',
            'label' => 'LBL_POST_FROM_FIRST_NAME_C',
            'type' => 'varchar',
            'module' => 'Cases',
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
            'name' => 'post_from_last_name_c',
            'label' => 'LBL_POST_FROM_LAST_NAME_C',
            'type' => 'varchar',
            'module' => 'Cases',
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
            'name' => 'source_c',
            'label' => 'LBL_SOURCE_C',
            'type' => 'enum',
            'module' => 'Cases',
            'help' => '',
            'comment' => '',
            'ext1' => 'case_sources_list', //maps to options - specify list name
            'default_value' => '', //key of entry in specified list
            'mass_update' => false, 
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

		/*********************** Cases - end ***********************/

        /*********************** Notes - start ***********************/

        array(
            'name' => 'comment_id_c',
            'label' => 'LBL_COMMENT_ID_C',
            'type' => 'varchar',
            'module' => 'Notes',
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
            'name' => 'comment_reply_id_c',
            'label' => 'LBL_COMMENT_REPLY_ID_C',
            'type' => 'varchar',
            'module' => 'Notes',
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
            'name' => 'post_data_in_fb_c',
            'label' => 'LBL_POST_DATA_IN_FB_C',
            'type' => 'varchar',
            'module' => 'Notes',
            'help' => '',
            'comment' => '',
            'default_value' => 'post',
            'max_size' => 255,
            'required' => false, 
            'reportable' => true, 
            'audited' => false, 
            'importable' => 'true',
            'duplicate_merge' => false, 
        ),

        array(
            'name' => 'post_id_c',
            'label' => 'LBL_POST_ID_C',
            'type' => 'varchar',
            'module' => 'Notes',
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

        /*********************** Notes - end ***********************/

    );

    require_once('ModuleInstall/ModuleInstaller.php');
    $moduleInstaller = new ModuleInstaller();
    $moduleInstaller->install_custom_fields($fields);

    /*********************** Create fields - end ***********************/

    echo "Success.";

?>
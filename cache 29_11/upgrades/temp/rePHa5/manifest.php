<?php

/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * ****************************************************************************** */


// THIS CONTENT IS GENERATED BY MBPackage.php
$manifest = array(
    0 =>
    array(
        'acceptable_sugar_versions' =>
        array(
            0 => '',
        ),
    ),
    1 =>
    array(
        'acceptable_sugar_flavors' =>
        array(
            0 => 'CE',
            1 => 'PRO',
            2 => 'ENT',
        ),
    ),
    'readme' => '',
    'key' => 'dash',
    'author' => 'Custom Dashboard Manager',
    'description' => 'Custom dashboard manager',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'custom_dashboard_manager',
    'published_date' => '2017-03-22 11:15:51',
    'type' => 'module',
    'version' => 1490181399,
    'remove_tables' => 'prompt',
);


$installdefs = array(
    'id' => 'custom_dashboard_manager',
    'copy' =>
    array(
        0 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/copy_dashboard.php',
            'to' => 'custom/modules/Administration/copy_dashboard.php',
        ),
        1 =>
        array(
            'from' => '<basepath>/custom-added/custom/themes/default/dashboard-manager/css/jquery.dataTables.min.css',
            'to' => 'custom/themes/default/dashboard-manager/css/jquery.dataTables.min.css',
        ),
        2 =>
        array(
            'from' => '<basepath>/custom-added/custom/themes/default/dashboard-manager/css/dashboard-manager.css',
            'to' => 'custom/themes/default/dashboard-manager/css/dashboard-manager.css',
        ),
        3 =>
        array(
            'from' => '<basepath>/custom-added/custom/themes/default/dashboard-manager/javascript/jquery.dataTables.min.js',
            'to' => 'custom/themes/default/dashboard-manager/javascript/jquery.dataTables.min.js',
        ),
        4 =>
        array(
            'from' => '<basepath>/custom-added/custom/themes/default/dashboard-manager/javascript/custom-dashboard-manager.js',
            'to' => 'custom/themes/default/dashboard-manager/javascript/custom-dashboard-manager.js',
        ),
        5 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/server_teams_users_processing.php',
            'to' => 'custom/modules/Administration/dashboard-manager/server_teams_users_processing.php',
        ),
        6 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/server_roles_users_processing.php',
            'to' => 'custom/modules/Administration/dashboard-manager/server_roles_users_processing.php',
        ),
        7 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/dashboard-manager-responce.php',
            'to' => 'custom/modules/Administration/dashboard-manager/dashboard-manager-responce.php',
        ),
        8 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/server_processing.php',
            'to' => 'custom/modules/Administration/dashboard-manager/server_processing.php',
        ),
        9 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/dashboard-manager-functions.php',
            'to' => 'custom/modules/Administration/dashboard-manager/dashboard-manager-functions.php',
        ),
        10 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/server_users_processing.php',
            'to' => 'custom/modules/Administration/dashboard-manager/server_users_processing.php',
        ),
        11 =>
        array(
            'from' => '<basepath>/custom-added/menu.php',
            'to' => 'custom/Extension/modules/dash_dashboard_manager/Ext/Menus/menu.php',
        ),
         12 =>
        array(
            'from' => '<basepath>/custom-added/custom/modules/Administration/dashboard-manager/dashboard_manager_entrypoint.php',
            'to' => 'custom/Extension/application/Ext/EntryPointRegistry/dashboard_manager_entrypoint.php',
        ),
        
    ),
    'administration' => array(
        array(
            'from' => '<basepath>/custom-added/custom/Extension/modules/Administration/Ext/Administration/dashboard-manager.php'
        )
    ),
    'language' => array(
        array(
            'from' => '<basepath>/custom-added/custom/Extension/modules/Administration/Ext/Language/en_us.dashboard_manager.php',
            'to_module' => 'Administration',
            'language' => 'en_us'
        )
    ),
         'entrypoints' => array (
       0 => array (
            'from' => '<basepath>/custom-added/custom/Extension/application/Ext/EntryPointRegistry/dashboard_manager_entrypoint.php',
            'to_module' => 'application',
            ),
        ),
);

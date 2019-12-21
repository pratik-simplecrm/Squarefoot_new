<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$layout_defs['TRThemePages'] = array(
    'subpanel_setup' => array(
        'users' => array(
            'order' => 10,
            'module' => 'Users',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'ausers_link',
            'title_key' => 'LBL_USERS_SUBPANEL_TITLE',
            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopSelectButton'),
            )
        ),
        'aclroles' => array(
            'order' => 10,
            'module' => 'ACLRoles',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'aclroles_link',
            'title_key' => 'LBL_ACLROLES_SUBPANEL_TITLE',
            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopSelectButton'),
            )
        )
    )
);
?>

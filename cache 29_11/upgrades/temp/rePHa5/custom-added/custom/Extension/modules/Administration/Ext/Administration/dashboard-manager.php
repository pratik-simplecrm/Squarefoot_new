<?php

    $admin_option_defs = array();
    $admin_option_defs['Administration']['dashboard_manager'] = array(
        'Administration',
        'LBL_LINK_NAME',
        'LBL_LINK_DESCRIPTION',
        './index.php?module=Administration&action=copy_dashboard',
    );

    $admin_group_header[] = array(
        'LBL_SECTION_HEADER',
        '',
        false,
        $admin_option_defs, 
        'LBL_SECTION_DESCRIPTION'
    );
    ?>

<?php

    $admin_option_defs = array();
    $admin_option_defs['Administration']['listview_field_background'] = array(
        //Icon name. Available icons are located in ./themes/default/images
        'Administration',
        
        //Link name label 
        'LBL_LISTVIEW_FIELD_BACKGROUND_LINK_NAME',
        
        //Link description label
        'LBL_LISTVIEW_FIELD_BACKGROUND_LINK_DESCRIPTION',
        
        //Link URL
        './index.php?module=lb_set_field_background&action=field_background',
    );

    $admin_group_header[] = array(
        //Section header label
        'LBL_LISTVIEW_FIELD_BACKGROUND_SECTION_HEADER',
        
        //$other_text parameter for get_form_header()
        '',
        
        //$show_help parameter for get_form_header()
        false,
        
        //Section links
        $admin_option_defs, 
        
        //Section description label
        'LBL_LISTVIEW_FIELD_BACKGROUND_SECTION_DESCRIPTION'
    );
    ?>

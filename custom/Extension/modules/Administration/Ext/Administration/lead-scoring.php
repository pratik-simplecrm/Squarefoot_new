<?php

    $admin_option_defs = array();
    $admin_option_defs['Administration']['lead_scoring'] = array(
        //Icon name. Available icons are located in ./themes/default/images
        'Administration',
        
        //Link name label 
        'LBL_LEAD_SCORING_LINK_NAME',
        
        //Link description label
        'LBL_LEAD_SCORING_LINK_DESCRIPTION',
        
        //Link URL
        './index.php?module=Administration&action=lead_opportunity_scoring',
    );

    $admin_group_header[] = array(
        //Section header label
        'LBL_LEAD_SCORING_SECTION_HEADER',
        
        //$other_text parameter for get_form_header()
        '',
        
        //$show_help parameter for get_form_header()
        false,
        
        //Section links
        $admin_option_defs, 
        
        //Section description label
        'LBL_LEAD_SCORING_SECTION_DESCRIPTION'
    );
    ?>

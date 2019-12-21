<?php

$viewdefs['TRThemePages']['EditView'] = array(
    'templateMeta' => array(
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        )
    ),
    'panels' => array(
        'lbl_trthemepages_main' => array(
            array(
                'puser_name',
                'page_index'),
            array(
                'page_priority', 
                'page_position_first'
            ),
            array(
                'name',
                ''
            )
        ),
        'lbl_security_panel' => array(
            array(
                array('name' => 'assigned_user_name', 'displayParams' => array('WinWidth' => 1000, 'WinHeight' => 600),),
                array('name' => 'team_name', 'displayParams' => array('WinWidth' => 1000, 'WinHeight' => 600),)
            )
        ),
        'lbl_description_panel' => array(
            array(
                array('name' => 'description',),
                '',
            )
        ),
    ),
);
?>

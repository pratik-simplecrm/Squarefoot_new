<?php

$viewdefs['TRThemePages']['DetailView'] = array(
    'templateMeta' => array(
        'useTabs' => false,
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),
        'form' => array(
            'buttons' => array(
                'EDIT',
                'DUPLICATE',
                'DELETE',
            ),
        ),
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
                array('name' => 'team_name', 'displayParams' => array('required' => true, 'WinWidth' => 1000, 'WinHeight' => 600),)
            ),
            array(
                array(
                    'name' => 'date_entered',
                    'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                    'label' => 'LBL_DATE_ENTERED',
                ),
                array(
                    'name' => 'date_modified',
                    'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                    'label' => 'LBL_DATE_MODIFIED',
                )
            )
        )
    )
);
?>

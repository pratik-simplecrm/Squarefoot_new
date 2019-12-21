<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');


$listViewDefs['TRThemePages'] = array(
    'NAME' => array(
        'width' => '20%',
        'label' => 'LBL_LIST_NAME',
        'link' => true,
        'default' => true,
    ),
    'PUSER_NAME' => array(
        'width' => '20%',
        'label' => 'LBL_LIST_PUSER_NAME',
        'module' => 'Accounts',
        'id' => 'PUSER_ID',
        'link' => true,
        'default' => true,
        'sortable' => true,
        'ACLTag' => 'USER',
        'related_fields' => array('puser_id')
    ),
    'PAGE_INDEX' => array(
        'width' => '10%', 
        'label' => 'LBL_PAGE_INDEX',
        'default' => true
    )
);
?>

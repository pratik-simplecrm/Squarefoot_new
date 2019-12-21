<?php

// License stuff

$subpanel_layout = array(

	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Accounts'),
	),

	'where' => '',
	
	'list_fields' => array (
		'name' => array (
			'vname' => 'LBL_LIST_ACCOUNT_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '45%',
			'default' => true,
		),
		'account_type' => array (
			'type' => 'enum',
			'vname' => 'LBL_TYPE',
			'width' => '15%',
			'default' => true,
		),
		'billing_address_city' => array (
			'vname' => 'LBL_LIST_CITY',
			'width' => '20%',
			'default' => true,
		),
		'phone_office' => array (
			'vname' => 'LBL_LIST_PHONE',
			'width' => '20%',
			'default' => true,
		),
		'edit_button' => array (
			'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
			'width' => '5%',
			'default' => true,
		),
		'remove_button' => array (
			'vname' => 'LBL_REMOVE',
			'widget_class' => 'SubPanelRemoveButtonAccount',
			'width' => '5%',
			'default' => true,
		),
	),
);
?>

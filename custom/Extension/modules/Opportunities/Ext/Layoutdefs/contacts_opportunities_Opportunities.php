<?php

    $layout_defs["Opportunities"]["subpanel_setup"]['Contacts'] = array (
    'order' => 100,
   'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_CONTACTS_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'contacts_opportunities',
  'top_buttons' => 
  array (
  	/*
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);
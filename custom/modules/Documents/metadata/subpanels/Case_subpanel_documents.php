<?php
// created: 2019-12-26 15:12:46
$subpanel_layout['list_fields'] = array (
  'document_name' => 
  array (
    'name' => 'document_name',
    'vname' => 'LBL_LIST_DOCUMENT_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'filename' => 
  array (
    'name' => 'filename',
    'vname' => 'LBL_LIST_FILENAME',
    'width' => '20%',
    'module' => 'Documents',
    'sortable' => false,
    'displayParams' => 
    array (
      'module' => 'Documents',
    ),
    'default' => true,
  ),
  'status_id' => 
  array (
    'name' => 'status_id',
    'vname' => 'LBL_LIST_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'documenttype_c' => 
  array (
    'type' => 'dynamicenum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_DOCUMENTTYPE',
    'width' => '10%',
  ),
  'active_date' => 
  array (
    'name' => 'active_date',
    'vname' => 'LBL_LIST_ACTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'get_latest' => 
  array (
    'widget_class' => 'SubPanelGetLatestButton',
    'module' => 'Documents',
    'width' => '5%',
    'default' => true,
  ),
  'load_signed' => 
  array (
    'widget_class' => 'SubPanelLoadSignedButton',
    'module' => 'Documents',
    'width' => '5%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Documents',
    'width' => '5%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Documents',
    'width' => '5%',
    'default' => true,
  ),
  'document_revision_id' => 
  array (
    'name' => 'document_revision_id',
    'usage' => 'query_only',
  ),
);
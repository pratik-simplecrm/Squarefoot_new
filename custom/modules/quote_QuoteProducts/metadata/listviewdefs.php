<?php
$module_name = 'quote_QuoteProducts';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'QUANTITY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'PRICE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_PRICE',
    'width' => '10%',
    'default' => true,
  ),
  'DISCOUNT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DISCOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'DIS_CHECK' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_DIS_CHECK',
    'width' => '10%',
  ),
  'DISCOUNTED_PRICE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DISCOUNTED_PRICE',
    'width' => '10%',
    'default' => true,
  ),
  'TAX' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TAX',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>

<?php
$dictionary['trfavorites'] = array(
	'table' => 'trfavorites',
	'fields' => array(
		array(
			'name' => 'beanid',
			'type' => 'varchar',
			'len' => 36
		),
		array(
			'name' => 'user_id',
			'type' => 'varchar',
			'len' => '36'
		),
		array(
			'name' => 'bean',
			'type' => 'varchar',
			'len' => '36',
		),
		array(
			'name' => 'date_entered',
			'type' => 'date'
		)
	),
	'indices' => array(
 		array(	'name'			=> 'tfr_idx',
				'type'			=> 'unique',
				'fields'		=> array('beanid', 'user_id'),
		),
 		array(	'name'			=> 'tsrusr_idx',
				'type'			=> 'index',
				'fields'		=> array('user_id'),
		),
		array(	'name'			=> 'tsrusrbean_idx',
				'type'			=> 'index',
				'fields'		=> array('user_id', 'bean'),
		),
	),

);
$dictionary['trreminders'] = array(
	'table'=> 'trreminders',
	'fields'=> array(
		array(	'name'			=> 'user_id',
				'type'			=> 'varchar',
				'len'			=> '36'
		),
		array(	'name'			=> 'bean',
				'type'			=> 'varchar',
				'len'			=> '36',
		),
		array(	'name'			=> 'bean_id',
				'type'			=> 'varchar',
				'len'			=> '36',
		),
		array(	'name'			=> 'reminder_date',
				'type'			=> 'date'
		)
 	),
	'indices' => array(
 		array(	'name'			=> 'tsr_idx',
				'type'			=> 'unique',
				'fields'		=> array('user_id', 'bean_id'),
		)
	),
);

$dictionary['trquicknotes'] = array(
		'table' => 'trquicknotes',
		'fields' => array(
				array(
						'name' => 'id',
						'type' => 'varchar',
						'len' => 36
				),
				array(
						'name' => 'bean_type',
						'type' => 'varchar',
						'len' => 100
				),
				array(
						'name' => 'bean_id',
						'type' => 'varchar',
						'len' => 36
				),
				array(
						'name' => 'user_id',
						'type' => 'varchar',
						'len' => 36
				),
				array(
						'name' => 'trdate',
						'type' => 'datetime'
				),
				array(
						'name' => 'trglobal',
						'type' => 'bool'
				),
				array(
						'name' => 'text',
						'type' => 'text'
				),
				array(
						'name' => 'deleted',
						'type' => 'bool'
				),
		),
		'indices' => array(
				array(	'name'			=> 'tqn_idx',
						'type'			=> 'unique',
						'fields'		=> array('id'),
				),
				array(	'name'			=> 'tqnusr_idx',
						'type'			=> 'index',
						'fields'		=> array('user_id'),
				),
				array(	'name'			=> 'tqnusrbean_idx',
						'type'			=> 'index',
						'fields'		=> array('bean_type', 'bean_id'),
				),
				array(	'name'			=> 'tqnselection_idx',
						'type'			=> 'index',
						'fields'		=> array('bean_type', 'bean_id', 'user_id', 'deleted'),
				),
		),

);

?>

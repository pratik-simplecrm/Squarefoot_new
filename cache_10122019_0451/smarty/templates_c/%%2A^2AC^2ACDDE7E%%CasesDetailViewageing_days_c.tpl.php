<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:02
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewageing_days_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/modules/AOW_WorkFlow/CasesDetailViewageing_days_c.tpl', 3, false),)), $this); ?>

<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['ageing_days_c']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['fields']['ageing_days_c']['value']), $this);?>

</span>
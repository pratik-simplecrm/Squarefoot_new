<?php /* Smarty version 2.6.29, created on 2019-11-20 17:47:49
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewmultienumstatus.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'multienum_to_array', 'cache/modules/AOW_WorkFlow/CasesDetailViewmultienumstatus.tpl', 4, false),)), $this); ?>

<?php if (! empty ( $this->_tpl_vars['fields']['status']['value'] ) && ( $this->_tpl_vars['fields']['status']['value'] != '^^' )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['status']['value']; ?>
">
<?php echo smarty_function_multienum_to_array(array('string' => $this->_tpl_vars['fields']['status']['value'],'assign' => 'vals'), $this);?>

<?php $_from = $this->_tpl_vars['vals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li style="margin-left:10px;"><?php echo $this->_tpl_vars['fields']['status']['options'][$this->_tpl_vars['item']]; ?>
</li>
<?php endforeach; endif; unset($_from);  endif; ?>
<?php /* Smarty version 2.6.29, created on 2019-12-10 11:20:37
         compiled from cache/modules/AOW_WorkFlow/CasesEditViewsupervisor_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'cache/modules/AOW_WorkFlow/CasesEditViewsupervisor_c.tpl', 7, false),array('function', 'sugar_getimagepath', 'cache/modules/AOW_WorkFlow/CasesEditViewsupervisor_c.tpl', 18, false),)), $this); ?>

<input type="text" name="<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" class="sqsEnabled" tabindex="1" id="<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['supervisor_c']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['supervisor_c']['id_name']; ?>
" 
	id="<?php echo $this->_tpl_vars['fields']['supervisor_c']['id_name']; ?>
" 
	value="<?php echo $this->_tpl_vars['fields']['user_id_c']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" tabindex="1" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_LABEL'), $this);?>
"
onclick='open_popup(
    "<?php echo $this->_tpl_vars['fields']['supervisor_c']['module']; ?>
", 
	600, 
	400, 
	"", 
	true, 
	false, 
	<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":'; ?>
"<?php echo $this->_tpl_vars['fields']['supervisor_c']['id_name']; ?>
"<?php echo ',"name":'; ?>
"<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
"<?php echo '}}'; ?>
, 
	"single", 
	true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
" tabindex="1" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['supervisor_c']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['supervisor_c']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
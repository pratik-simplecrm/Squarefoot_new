<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:02
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewcontractor_c.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_ajax_url', 'cache/modules/AOW_WorkFlow/CasesDetailViewcontractor_c.tpl', 5, false),)), $this); ?>

 
<?php if (! empty ( $this->_tpl_vars['fields']['scrm_vendors_id_c']['value'] )):  ob_start(); ?>index.php?module=scrm_Vendors&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['scrm_vendors_id_c']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="scrm_vendors_id_c" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['scrm_vendors_id_c']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['contractor_c']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['scrm_vendors_id_c']['value'] )): ?></a><?php endif; ?>
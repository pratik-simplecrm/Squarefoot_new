<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:02
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewstate.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['state']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['state']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['state']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['state']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['state']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['state']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['state']['options'][$this->_tpl_vars['fields']['state']['value']]; ?>

<?php endif; ?>
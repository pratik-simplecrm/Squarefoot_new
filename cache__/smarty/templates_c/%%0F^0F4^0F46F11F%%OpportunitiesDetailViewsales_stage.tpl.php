<?php /* Smarty version 2.6.29, created on 2019-11-21 04:12:14
         compiled from cache/modules/AOW_WorkFlow/OpportunitiesDetailViewsales_stage.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['sales_stage']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['sales_stage']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['sales_stage']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['sales_stage']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['sales_stage']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['sales_stage']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['sales_stage']['options'][$this->_tpl_vars['fields']['sales_stage']['value']]; ?>

<?php endif; ?>
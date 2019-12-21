<?php /* Smarty version 2.6.29, created on 2019-12-10 07:37:40
         compiled from cache/modules/AOW_WorkFlow/MeetingsDetailViewflag_c.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['flag_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['flag_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['flag_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['flag_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['flag_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['flag_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['flag_c']['options'][$this->_tpl_vars['fields']['flag_c']['value']]; ?>

<?php endif; ?>
<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:02
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewreasonofreschedule_c.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['reasonofreschedule_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['reasonofreschedule_c']['options'][$this->_tpl_vars['fields']['reasonofreschedule_c']['value']]; ?>

<?php endif; ?>
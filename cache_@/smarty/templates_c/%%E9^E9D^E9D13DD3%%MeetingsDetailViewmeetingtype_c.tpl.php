<?php /* Smarty version 2.6.29, created on 2019-12-09 09:19:56
         compiled from cache/modules/AOW_WorkFlow/MeetingsDetailViewmeetingtype_c.tpl */ ?>


<?php if (is_string ( $this->_tpl_vars['fields']['meetingtype_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['meetingtype_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['meetingtype_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['meetingtype_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['meetingtype_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['meetingtype_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['meetingtype_c']['options'][$this->_tpl_vars['fields']['meetingtype_c']['value']]; ?>

<?php endif; ?>
<?php /* Smarty version 2.6.29, created on 2019-11-20 09:51:57
         compiled from include/SugarFields/Fields/Bool/ListView.tpl */ ?>

    <?php if (strval ( $this->_tpl_vars['parentFieldArray'][$this->_tpl_vars['col']] ) == '1' || strval ( $this->_tpl_vars['parentFieldArray'][$this->_tpl_vars['col']] ) == 'yes' || strval ( $this->_tpl_vars['parentFieldArray'][$this->_tpl_vars['col']] ) == 'on'):  $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php /* Smarty version 2.6.29, created on 2019-11-30 04:18:58
         compiled from cache/modules/AOW_WorkFlow/CasesEditViewcase_number.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['case_number']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['case_number']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['case_number']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['case_number']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['case_number']['name']; ?>
' size='30' maxlength='11' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='1'    >
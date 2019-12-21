<?php /* Smarty version 2.6.29, created on 2019-11-20 12:36:27
         compiled from cache/modules/AOW_WorkFlow/CasesEditViewdescription.tpl */ ?>

<?php if (empty ( $this->_tpl_vars['fields']['description']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['description']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['description']['value']);  endif; ?>




<textarea  id='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
'
rows="2"
cols="32"
title='' tabindex="1" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>


<?php echo ''; ?>
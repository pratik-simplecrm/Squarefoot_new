<?php /* Smarty version 2.6.29, created on 2019-12-09 09:58:19
         compiled from cache/modules/AOW_WorkFlow/MeetingsEditViewjoin_url.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['join_url']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['join_url']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['join_url']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['join_url']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['join_url']['name']; ?>
' size='30' 
    maxlength='200' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >
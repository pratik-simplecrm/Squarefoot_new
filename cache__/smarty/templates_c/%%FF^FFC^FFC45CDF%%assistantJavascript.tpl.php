<?php /* Smarty version 2.6.29, created on 2019-11-20 10:10:27
         compiled from modules/ModuleBuilder/tpls/assistantJavascript.tpl */ ?>
<script>
<?php echo '
if(typeof(Assistant)!="undefined" && Assistant.mbAssistant){
	//Assistant.mbAssistant.render(document.body);
'; ?>

<?php if ($this->_tpl_vars['userPref']): ?>
	<?php echo 'Assistant.processUserPref("';  echo $this->_tpl_vars['userPref'];  echo '");'; ?>

<?php endif;  if ($this->_tpl_vars['assistant']['key'] && $this->_tpl_vars['assistant']['group']): ?>
	<?php echo 'Assistant.mbAssistant.setBody(SUGAR.language.get(\'ModuleBuilder\',\'assistantHelp\').';  echo $this->_tpl_vars['assistant']['group'];  echo '.';  echo $this->_tpl_vars['assistant']['key'];  echo ');'; ?>

<?php endif;  echo '
	if(Assistant.mbAssistant.visible){
		Assistant.mbAssistant.show();
		}
}
'; ?>

</script>
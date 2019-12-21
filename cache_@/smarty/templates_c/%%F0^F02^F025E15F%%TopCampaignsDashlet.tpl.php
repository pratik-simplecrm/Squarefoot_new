<?php /* Smarty version 2.6.29, created on 2019-12-09 10:03:19
         compiled from modules/Campaigns/Dashlets/TopCampaignsDashlet/TopCampaignsDashlet.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'modules/Campaigns/Dashlets/TopCampaignsDashlet/TopCampaignsDashlet.tpl', 50, false),)), $this); ?>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="list view">
	<tr>
		<th>&nbsp;</td>
		<th align="center"><?php echo $this->_tpl_vars['lbl_campaign_name']; ?>
</td>
		<th align="center"><?php echo $this->_tpl_vars['lbl_revenue']; ?>
</td>
	</tr>
	<?php echo smarty_function_counter(array('name' => 'num','assign' => 'num'), $this);?>

	<?php $_from = $this->_tpl_vars['top_campaigns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['campaign']):
?>
	<tr>
		<td class="oddListRowS1" align="center" valign="top" width="6%"><?php echo $this->_tpl_vars['num']; ?>
.</td>
		<td class="oddListRowS1" align="left" valign="top" width="74%"><a href="index.php?module=Campaigns&action=DetailView&record=<?php echo $this->_tpl_vars['campaign']['campaign_id']; ?>
"><?php echo $this->_tpl_vars['campaign']['campaign_name']; ?>
</a></td>
		<td class="oddListRowS1" align="left" valign="top" width="20%"><?php echo $this->_tpl_vars['campaign']['revenue']; ?>
</td>
	</tr>
	<?php echo smarty_function_counter(array('name' => 'num'), $this);?>

	<?php endforeach; endif; unset($_from); ?>
</table>
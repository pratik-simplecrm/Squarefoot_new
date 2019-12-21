<?php /* Smarty version 2.6.29, created on 2019-12-09 09:24:33
         compiled from cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 58, false),array('function', 'counter', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 64, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 70, false),array('function', 'html_options', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 186, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 214, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 71, false),array('modifier', 'lookup', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 211, false),array('modifier', 'count', 'cache/themes/SuiteR/modules/Accounts/form_QuickCreate_Accounts.tpl', 291, false),)), $this); ?>

<style>
<?php echo '
.main
{
background-image:none !important;
}
footer
{
background-image:none !important;
}
.yui-nav{
margin-bottom: 20px;
}
'; ?>

</style>

<script>
<?php echo '
$(document).ready(function(){
$("ul.clickMenu").each(function(index, node){
$(node).sugarActionMenu();
});
});
'; ?>

</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (( ! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] ) ) && ! ( isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true' )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']):  echo $_REQUEST['return_relationship'];  elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['relate_to'];  elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['return_module'];  endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<?php $this->assign('place', '_HEADER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?>  <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">  <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="form_QuickCreate_Accounts_tabs"
>
<div >
<div id="detailpanel_1" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_<?php echo $this->_tpl_vars['module']; ?>
_Subpanel'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='name_label' width='12.5%' data-total-columns="1" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='150' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='7'  >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='website_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['website']['value'] )): ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255' value='<?php echo $this->_tpl_vars['fields']['website']['value']; ?>
' title='' tabindex='0'  >
<?php else: ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255'	   	   <?php if ($this->_tpl_vars['displayView'] == 'advanced_search' || $this->_tpl_vars['displayView'] == 'basic_search'): ?>value=''<?php else: ?>value='http://'<?php endif; ?> 
title='' tabindex='0'  >
<?php endif; ?>
<td valign="top" id='phone_office_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_office']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['phone_office']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['phone_office']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='email1_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>
</span>
<td valign="top" id='phone_fax_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_fax']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='industry_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['industry']['value'] ) && $this->_tpl_vars['fields']['industry']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['industry']['options']);  ob_start();  echo $this->_tpl_vars['fields']['industry']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['industry']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['industry']['value'] ) && $this->_tpl_vars['fields']['industry']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['industry']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['industry']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['industry']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['industry']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['industry']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['industry']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
<td valign="top" id='account_type_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['account_type']['value'] ) && $this->_tpl_vars['fields']['account_type']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['account_type']['options']);  ob_start();  echo $this->_tpl_vars['fields']['account_type']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['account_type']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['account_type']['value'] ) && $this->_tpl_vars['fields']['account_type']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['account_type']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['account_type']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' data-total-columns="1" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['assigned_user_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"form_QuickCreate_Accounts","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
<?php endif; ?>
</div></div>

<script language="javascript">
    var _form_id = '<?php echo $this->_tpl_vars['form_id']; ?>
';
    <?php echo '
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == \'\') ? \'EditView\' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    '; ?>

</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<?php $this->assign('place', '_FOOTER'); ?>
<!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?>  <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">  <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
</td>
</tr>
</table>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("form_QuickCreate_Accounts",
    function () { initEditView(document.forms.form_QuickCreate_Accounts) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {
$(document).ready(function() {
    $(".collapseLink,.expandLink").click(function (e) { e.preventDefault(); });
  });
}
</script><?php echo '
<script type="text/javascript">
addForm(\'form_QuickCreate_Accounts\');addToValidate(\'form_QuickCreate_Accounts\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'form_QuickCreate_Accounts\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'account_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'industry\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'annual_revenue\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_REVENUE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_fax\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_4\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_city\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_state\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_postalcode\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_country\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'rating\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RATING','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_office\', \'phone\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_alternate\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_ALT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'website\', \'url\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'ownership\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OWNERSHIP','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'employees\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'ticker_symbol\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TICKER_SYMBOL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_4\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email1\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email_addresses_non_primary\', \'email\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_NON_PRIMARY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parent_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_ACCOUNT_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'sic_code\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SIC_CODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parent_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email_opt_out\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_OPT_OUT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'invalid_email\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVALID_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email\', \'email\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'campaign_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'campaign_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'flip_charts_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FLIP_CHARTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'consult_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONSULT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'reference2_comments_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE2_COMMENTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'corporate_rate_value_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CORPORATE_RATE_VALUE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'consult_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONSULT_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'travel_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TRAVEL_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'fac_rent_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_RENT_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'contractor_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACTOR','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'reference3_comments_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE3_COMMENTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'other_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'internet_avail_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INTERNET_AVAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'others_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHERS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'reqd_deposit_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REQD_DEPOSIT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'contact_id4_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'num_guest_rooms_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUM_GUEST_ROOMS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'cat_contract_status_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAT_CONTRACT_STATUS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parking_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PARKING_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'sports_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPORTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'customer_id_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CUSTOMER_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'caterer_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CATERER_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'av_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_AV_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'fac_rating_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_RATING','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'stages_allowed_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STAGES_ALLOWED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'regn_area_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REGN_AREA','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'theatre_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_THEATRE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'facilitate_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FACILITATE_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'hospital_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_HOSPITAL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'builder_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BUILDER','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'meeting_rooms_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MEETING_ROOMS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'deposit_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DEPOSIT_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'receiving_dock_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEIVING_DOCK','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'educational_institution_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EDUCATIONAL_INSTITUTION','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'refund_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REFUND_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'venue_rating_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_RATING','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'dining_room_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DINING_ROOM','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'implement_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IMPLEMENT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'food_specialty_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FOOD_SPECIALTY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'venue_comments_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_COMMENTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'reception_area_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEPTION_AREA','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'contact_id3_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'implement_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IMPLEMENT_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'reference1_comments_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE1_COMMENTS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'ven_contract_status_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VEN_CONTRACT_STATUS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'fac_contract_status_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_CONTRACT_STATUS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parking_avail_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PARKING_AVAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'receiving_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEIVING_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'contact_id1_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'corporate_rate_avail_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CORPORATE_RATE_AVAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'caterer_rating_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CATERER_RATING','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'contact_id2_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'customer_type_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CUSTOMER_TYPE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'venue_restrictions_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_RESTRICTIONS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'travel_reimb_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TRAVEL_REIMB','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'exclusive_av_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EXCLUSIVE_AV','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'exclusive_caterer_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EXCLUSIVE_CATERER','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'own_facil_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OWN_FACIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'is_existing_customer_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_EXISTING_CUSTOMER','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'hotel_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_HOTEL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'flip_chart_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FLIP_CHART_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'pharmaceutical_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PHARMACEUTICAL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'retail_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RETAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'venue_type_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_TYPE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'will_book_block_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WILL_BOOK_BLOCK','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'internet_fees_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INTERNET_FEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'caterer_restrictions_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CATERER_RESTRICTIONS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'av_avail_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_AV_AVAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'facilitate_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FACILITATE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'opportunity_id_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY_OPPORTUNITY_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'opportunity_c\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_address_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_ADDRESS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_geocode_status_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_GEOCODE_STATUS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_lat_c\', \'float\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_LAT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_lng_c\', \'float\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_LNG','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'form_QuickCreate_Accounts\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Accounts','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'form_QuickCreate_Accounts_assigned_user_name\']={"form":"form_QuickCreate_Accounts","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>

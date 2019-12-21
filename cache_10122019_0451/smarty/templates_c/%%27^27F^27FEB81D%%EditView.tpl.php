<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:13
         compiled from cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 53, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 79, false),array('modifier', 'lookup', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 179, false),array('modifier', 'count', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 259, false),array('function', 'sugar_include', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 66, false),array('function', 'counter', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 72, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 78, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 121, false),array('function', 'html_options', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 154, false),array('function', 'sugar_number_format', 'cache/themes/SuiteR/modules/AOR_Reports/EditView.tpl', 386, false),)), $this); ?>

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
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE_HEADER"><?php endif; ?>  <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL_HEADER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && empty ( $this->_tpl_vars['fields']['id']['value'] ) ) && empty ( $_REQUEST['return_id'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ! empty ( $_REQUEST['return_module'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=<?php echo $_REQUEST['return_action']; ?>
&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=AOR_Reports'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=AOR_Reports", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table>
<div class="edit view edit508" id="detailpanel_fields_select">
<h4><?php echo $this->_tpl_vars['MOD']['LBL_AOR_MODULETREE_SUBPANEL_TITLE']; ?>
</h4>
<div id="fieldTree" class="dragbox aor_dragbox"></div>
<br>
<h4><?php echo $this->_tpl_vars['MOD']['LBL_AOR_FIELDS_SUBPANEL_TITLE']; ?>
 <span id="module-name"></span></h4>
<div id="fieldTreeLeafs" class="dragbox aor_dragbox"></div>
</div><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
>
<div >
<div id="detailpanel_1" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_<?php echo $this->_tpl_vars['module']; ?>
_Subpanel'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='name_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'AOR_Reports'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='255' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='7'  >
<td valign="top" id='assigned_user_name_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'AOR_Reports'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
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
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
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

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='report_module_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORT_MODULE','module' => 'AOR_Reports'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['report_module']['value'] ) && $this->_tpl_vars['fields']['report_module']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['report_module']['options'],'selected' => $this->_tpl_vars['fields']['report_module']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['report_module']['options'],'selected' => $this->_tpl_vars['fields']['report_module']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['report_module']['options']);  ob_start();  echo $this->_tpl_vars['fields']['report_module']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['report_module']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['report_module']['value'] ) && $this->_tpl_vars['fields']['report_module']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['report_module']['options'],'selected' => $this->_tpl_vars['fields']['report_module']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['report_module']['options'],'selected' => $this->_tpl_vars['fields']['report_module']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo '");
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
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['report_module']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo '");
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
sync_';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['report_module']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo '", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['report_module']['name'];  echo '");
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
<td valign="top" id='_label' width='12.5%' data-total-columns="2" scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='graphs_per_row_label' width='12.5%' data-total-columns="2" scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAPHS_PER_ROW','module' => 'AOR_Reports'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['graphs_per_row']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['graphs_per_row']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['graphs_per_row']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['graphs_per_row']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['graphs_per_row']['name']; ?>
' size='30'  value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='0'    >
<td valign="top" id='_label' width='12.5%' data-total-columns="2" scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' data-total-columns="2" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
<?php endif; ?>
</div></div>
<?php echo '
<style type="text/css">
#EditView_tabs {float: left;}
</style>
'; ?>

<div id="report-editview-footer">
<?php echo '
<script src="modules/AOR_Reports/js/jqtree/tree.jquery.js"></script>
<script src="modules/AOR_Fields/fieldLines.js"></script>
<script src="modules/AOR_Conditions/conditionLines.js"></script>
<script src="modules/AOR_Charts/chartLines.js"></script>
<link rel="stylesheet" href="include/javascript/jquery/themes/base/jquery-ui.min.css">
<script src="include/javascript/jquery/jquery-ui-min.js"></script>
<script>
$(document).ready(function(){
SUGAR.util.doWhen("typeof $(\'#fieldTree\').tree != \'undefined\'", function(){
var $moduleTree = $(\'#fieldTree\').tree({
data: {},
dragAndDrop: false,
selectable: false,
onDragStop: function(node, e,thing){
//                    var target = $(document.elementFromPoint(e.pageX - window.pageXOffset, e.pageY - window.pageYOffset));
//                    if(node.type != \'field\'){
//                        return;
//                    }
//                    if(target.closest(\'#fieldLines\').length > 0){
//                        addNodeToFields(node);
//                        updateChartDimensionSelects();
//                    }else if(target.closest(\'#conditionLines\').length > 0){
//                        addNodeToConditions(node);
//                    }
},
onCanMoveTo: function(){
return false;
}
});
function loadTreeData(module, node){
var _node = node;
$.getJSON(\'index.php\',
{
\'module\' : \'AOR_Reports\',
\'action\' : \'getModuleTreeData\',
\'aor_module\' : module,
\'view\' : \'JSON\'
},
function(relData){
processTreeData(relData, _node);
}
);
}
var treeDataLeafs = [];
var dropFieldLine = function(node) {
addNodeToFields(node);
updateChartDimensionSelects();
};
var dropConditionLine = function(node) {
var newConditionLine = addNodeToConditions(node);
LogicalOperatorHandler.hideUnnecessaryLogicSelects();
ConditionOrderHandler.setConditionOrders();
ParenthesisHandler.addParenthesisLineIdent();
return newConditionLine;
};
var showTreeDataLeafs = function(treeDataLeafs, module, module_name, module_path_display) {
if (typeof module_name == \'undefined\' || !module_name) {
module_name = module;
}
if (typeof module_path_display == \'undefined\' || !module_path_display) {
module_path_display = module_name;
}
$(\'#module-name\').html(\'(<span title="\' + module_path_display + \'">\' + module_name + \'</span>)\');
$(\'#fieldTreeLeafs\').remove();
$(\'#detailpanel_fields_select\').append(\'<div id="fieldTreeLeafs" class="dragbox aor_dragbox" title="';  echo $this->_tpl_vars['MOD']['LBL_TOOLTIP_DRAG_DROP_ELEMS'];  echo '"></div>\');
$(\'#fieldTreeLeafs\').tree({
data: treeDataLeafs,
dragAndDrop: true,
selectable: true,
onCanSelectNode: function(node) {
if($(\'#report-editview-footer .toggle-detailpanel_fields\').hasClass(\'active\')) {
dropFieldLine(node);
}
else if($(\'#report-editview-footer .toggle-detailpanel_conditions\').hasClass(\'active\')) {
dropConditionLine(node);
}
},
onDragMove: function() {
$(\'.drop-area\').addClass(\'highlighted\');
},
onDragStop: function(node, e,thing){
$(\'.drop-area\').removeClass(\'highlighted\');
var target = $(document.elementFromPoint(e.pageX - window.pageXOffset, e.pageY - window.pageYOffset));
if(node.type != \'field\'){
return;
}
if(target.closest(\'#fieldLines\').length > 0){
dropFieldLine(node);
}else if(target.closest(\'#conditionLines\').length > 0){
var conditionLineTarget = ConditionOrderHandler.getConditionLineByPageEvent(e);
var conditionLineNew = dropConditionLine(node);
if(conditionLineTarget) {
ConditionOrderHandler.putPositionedConditionLines(conditionLineTarget, conditionLineNew);
ConditionOrderHandler.setConditionOrders();
}
ParenthesisHandler.addParenthesisLineIdent();
}
else if(target.closest(\'.tab-toggler\').length > 0) {
target.closest(\'.tab-toggler\').click();
if(target.closest(\'.tab-toggler\').hasClass(\'toggle-detailpanel_fields\')) {
dropFieldLine(node);
}
else if (target.closest(\'.tab-toggler\').hasClass(\'toggle-detailpanel_conditions\')) {
dropConditionLine(node);
}
}
},
onCanMoveTo: function(){
return false;
}
});
};
function loadTreeLeafData(node){
var module = node.module;
var module_name = node.name;
var module_path_display = node.module_path_display;
if(!treeDataLeafs[module]) {
$.getJSON(\'index.php\',
{
\'module\': \'AOR_Reports\',
\'action\': \'getModuleFields\',
\'aor_module\': node.module,
\'view\': \'JSON\'
},
function (fieldData) {
var treeData = [];
for (var field in fieldData) {
if (field) {
treeData.push(
{
id: field,
label: fieldData[field],
\'load_on_demand\': false,
type: \'field\',
module: node.module,
module_path: node.module_path,
module_path_display: node.module_path_display
});
}
}
//$(\'#fieldTree\').tree(\'loadData\',treeData,node);
//node.loaded = true;
//$(\'#fieldTree\').tree(\'openNode\', node);
treeDataLeafs[module] = treeData;
showTreeDataLeafs(treeDataLeafs[module], module, module_name, module_path_display);
}
);
}
else {
showTreeDataLeafs(treeDataLeafs[module], module, module_name, module_path_display);
}
}
function processTreeData(relData, node){
var treeData = [];
for(var field in relData){
if(field) {
var modulePath = \'\';
var modulePathDisplay = \'\';
if(relData[field][\'type\'] == \'relationship\') {
modulePath = field;
if (node) {
modulePath = node.module_path + ":" + field;
modulePathDisplay = node.module_path_display + " : "+relData[field][\'module_label\'];
}else{
modulePathDisplay = $(\'#report_module option:selected\').text() + \' : \' + relData[field][\'module_label\'];
}
}else{
if (node) {
modulePath = node.module_path;
modulePathDisplay = node.module_path_display;
}else{
modulePathDisplay = relData[field][\'module_label\'];
}
}
var newNode = {
id: field,
label: relData[field][\'label\'],
load_on_demand : true,
type: relData[field][\'type\'],
module: relData[field][\'module\'],
module_path: modulePath,
module_path_display: modulePathDisplay};
treeData.push(newNode);
}
}
$(\'#fieldTree\').tree(\'loadData\',treeData, node);
if(node){
node.loaded = true;
$(\'#fieldTree\').tree(\'openNode\', node);
}
else
{
if($(\'#fieldTree a:first\').length)
$(\'#fieldTree a:first\').click();
}
}
$(\'#fieldTree\').on(
\'click\',
\'.jqtree-toggler, .jqtree-title\', //
function(event) {
if($(this).hasClass(\'jqtree-title\')) {
$(this).prev().click();
return;
}
//console.log(event);
var node = $(this).closest(\'li.jqtree_common\').data(\'node\');
if(node.loaded) {
}else if(node.type == \'relationship\'){
loadTreeData(node.module, node);
}else{
loadTreeLeafData(node);
$(\'#fieldTree\').tree(\'openNode\', node);
}
$(\'.jqtree-selected\').removeClass(\'jqtree-selected\');
$(this).closest(\'li\').addClass(\'jqtree-selected\');
return true;
}
);
var clearTreeDataFields = function() {
$(\'#module-name\').html(\'\');
$(\'#fieldTreeLeafs\').html(\'\');
}
$(\'#report_module\').change(function(){
report_module = $(this).val();
loadTreeData($(this).val());
clearTreeDataFields();
clearFieldLines();
clearConditionLines();
clearChartLines();
});
$(\'#addChartButton\').click(function(){
loadChartLine({});
updateChartDimensionSelects();
});
report_module = $(\'#report_module\').val();
loadTreeData($(\'#report_module\').val());
$.each(fieldLines,function(key,val){
loadFieldLine(val);
});
$.each(conditionLines,function(key,val){
loadConditionLine(val);
});
$.each(chartLines,function(key,val){
loadChartLine(val);
});
updateChartDimensionSelects();
});
});
</script>
'; ?>

<div class="tab-togglers">
<div class="tab-toggler toggle-detailpanel_fields active">
<h4 class="button"><?php echo $this->_tpl_vars['MOD']['LBL_AOR_FIELDS_SUBPANEL_TITLE']; ?>
</h4>
</div>
<div class="tab-toggler toggle-detailpanel_conditions ">
<h4 class="button"><?php echo $this->_tpl_vars['MOD']['LBL_AOR_CONDITIONS_SUBPANEL_TITLE']; ?>
</h4>
</div>
<div class="tab-toggler toggle-detailpanel_charts ">
<h4 class="button"><?php echo $this->_tpl_vars['MOD']['LBL_AOR_CHARTS_SUBPANEL_TITLE']; ?>
</h4>
</div>
</div>
<div class="clear"></div>
<div class="tab-panels">
<div class="edit view edit508 " id="detailpanel_fields">
<table id="group_display_table" style="display: none;">
<tbody>
<tr>
<td><?php echo $this->_tpl_vars['MOD']['LBL_MAIN_GROUPS']; ?>
</td>
<td>
<select id="group_display" name="aor_fields_group_display[0]"></select>
<select id="group_display_1" name="aor_fields_group_display[1]" style="display: none;"></select>
<?php echo '
<script type="text/javascript">
                            $(function(){
                                setInterval(function(){
                                    if($(\'#group_display\').val() == -1) {
                                        $(\'#group_display_1\').val(-1);
                                        $(\'#group_display_1\').css(\'display\', \'none\');
                                    }
                                    else {
                                        if($(\'#group_display_1\').val() == $(\'#group_display\').val()) {
                                            $(\'#group_display_1\').val(-1);
                                        }
                                        $(\'#group_display_1 option\').show();
                                        $(\'#group_display_1 option[value="\' + $(\'#group_display\').val() + \'"]\').hide();

                                        // todo: temporary remove the secondary select for multi-group report
                                        $(\'#group_display_1\').css(\'display\', \'none\');
                                        $(\'#group_display_1\').val(-1);

                                        //$(\'#group_display_1\').css(\'display\', \'block\');
                                    }

                                }, 100);
                            });
                        </script>
'; ?>

</td>
</tr>
</tbody>
</table>
<div class="drop-area" id="fieldLines" style="min-height: 450px;">
</div>
</div>
<div class="edit view edit508 hidden" id="detailpanel_conditions">
<div class="drop-area" id="conditionLines"  style="min-height: 450px;">
</div>
<hr>
<table>
<tbody id="aor_condition_parenthesis_btn" class="connectedSortableConditions">
<tr class="parentheses-btn"><td class="condition-sortable-handle"><?php echo $this->_tpl_vars['MOD']['LBL_ADD_PARENTHESIS']; ?>
</td></tr>
</tbody>
</table>
</div>
<div class="edit view edit508 hidden" id="detailpanel_charts">
<div id="chartLines">
<table>
<thead id="chartHead" style="display: none;">
<tr>
<td></td>
<td><?php echo $this->_tpl_vars['MOD']['LBL_CHART_TITLE']; ?>
</td>
<td><?php echo $this->_tpl_vars['MOD']['LBL_CHART_TYPE']; ?>
</td>
<td><?php echo $this->_tpl_vars['MOD']['LBL_CHART_X_FIELD']; ?>
</td>
<td><?php echo $this->_tpl_vars['MOD']['LBL_CHART_Y_FIELD']; ?>
</td>
</tr>
</thead>
<tbody></tbody>
</table>
</div>
<button id="addChartButton" type="button"><?php echo $this->_tpl_vars['MOD']['LBL_ADD_CHART']; ?>
</button>
</div>
</div>
<?php echo '
<script type="text/javascript">

    setModuleFieldsPendingFinishedCallback(function(){
        var parenthesisBtnHtml;
        $( "#aor_conditions_body, #aor_condition_parenthesis_btn" ).sortable({
            handle: \'.condition-sortable-handle\',
            placeholder: "ui-state-highlight",
            cancel: ".parenthesis-line",
            connectWith: ".connectedSortableConditions",
            start: function(event, ui) {
                parenthesisBtnHtml = $(\'#aor_condition_parenthesis_btn\').html();
            },
            stop: function(event, ui) {
                if(event.target.id == \'aor_condition_parenthesis_btn\') {
                    $(\'#aor_condition_parenthesis_btn\').html(\'<tr class="parentheses-btn">\' + ui.item.html() + \'</tr>\');
                    ParenthesisHandler.replaceParenthesisBtns();
                }
                else {
                    if($(this).attr(\'id\') == \'aor_conditions_body\' && parenthesisBtnHtml != $(\'#aor_condition_parenthesis_btn\').html()) {
                        $(this).sortable("cancel");
                    }
                }
                LogicalOperatorHandler.hideUnnecessaryLogicSelects();
                ConditionOrderHandler.setConditionOrders();
                ParenthesisHandler.addParenthesisLineIdent();
            }
        });//.disableSelection();
        LogicalOperatorHandler.hideUnnecessaryLogicSelects();
        ConditionOrderHandler.setConditionOrders();
        ParenthesisHandler.addParenthesisLineIdent();
        FieldLineHandler.makeGroupDisplaySelectOptions();
    });

    $(function(){

        $(\'#EditView_tabs .clear\').remove();
        $(\'#EditView_tabs\').attr(\'style\', \'width: 78%;\');

        $( \'#aor_condition_parenthesis_btn\' ).bind( "sortstart", function (event, ui) {
            ui.helper.css(\'margin-top\', $(window).scrollTop() );
        });
        $( \'#aor_condition_parenthesis_btn\' ).bind( "sortbeforestop", function (event, ui) {
            ui.helper.css(\'margin-top\', 0 );
        });

        $(window).resize()
        {
            $(\'div.panel-heading a div\').css({
                width: $(\'div.panel-heading a\').width() - 14
            });
        }

        var reportToggler = function(elem) {
            var marker = \'toggle-\';
            var classes = $(elem).attr(\'class\').split(\' \');
            $(\'.tab-togglers .tab-toggler\').removeClass(\'active\');
            $(elem).addClass(\'active\');
            $(\'.tab-panels .edit.view\').addClass(\'hidden\');
            $.each(classes, function(i, cls){
                if(cls.substring(0, marker.length) == marker) {
                    var panelId = cls.substring(marker.length);
                    $(\'#\'+panelId).removeClass(\'hidden\');
                }
            });
        };

        $(\'.tab-toggler\').click(function(){
            reportToggler(this);
        });


    });
</script>
'; ?>

</div>
<div style="clear: both;"></div>
<div style="display: block; float: none;">

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
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE_FOOTER"><?php endif; ?>  <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL_FOOTER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && empty ( $this->_tpl_vars['fields']['id']['value'] ) ) && empty ( $_REQUEST['return_id'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ! empty ( $_REQUEST['return_module'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=<?php echo $_REQUEST['return_action']; ?>
&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=AOR_Reports'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=AOR_Reports", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script></div><script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
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
addForm(\'EditView\');addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'report_module\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORT_MODULE','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'graphs_per_row\', \'int\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAPHS_PER_ROW','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'field_lines\', \'function\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FIELD_LINES','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'condition_lines\', \'function\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONDITION_LINES','module' => 'AOR_Reports','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOR_Reports','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'AOR_Reports','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>

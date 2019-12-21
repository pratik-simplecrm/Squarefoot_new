
<style>
{literal}
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
{/literal}
</style>

<script>
{literal}
$(document).ready(function(){
$("ul.clickMenu").each(function(index, node){
$(node).sugarActionMenu();
});
});
{/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_HEADER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=AOR_Reports'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=AOR_Reports", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
{$PAGINATION}
</td>
</tr>
</table>
<div class="edit view edit508" id="detailpanel_fields_select">
<h4>{$MOD.LBL_AOR_MODULETREE_SUBPANEL_TITLE}</h4>
<div id="fieldTree" class="dragbox aor_dragbox"></div>
<br>
<h4>{$MOD.LBL_AOR_FIELDS_SUBPANEL_TITLE} <span id="module-name"></span></h4>
<div id="fieldTreeLeafs" class="dragbox aor_dragbox"></div>
</div>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
>
<div >
<div id="detailpanel_1" >
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_{$module}_Subpanel'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
id='{$fields.name.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      accesskey='7'  >
<td valign="top" id='assigned_user_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='report_module_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORT_MODULE' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.report_module.name}" 
id="{$fields.report_module.name}" 
title=''       
>
{if isset($fields.report_module.value) && $fields.report_module.value != ''}
{html_options options=$fields.report_module.options selected=$fields.report_module.value}
{else}
{html_options options=$fields.report_module.options selected=$fields.report_module.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.report_module.options }
{capture name="field_val"}{$fields.report_module.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.report_module.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.report_module.name}" 
id="{$fields.report_module.name}" 
title=''          
>
{if isset($fields.report_module.value) && $fields.report_module.value != ''}
{html_options options=$fields.report_module.options selected=$fields.report_module.value}
{else}
{html_options options=$fields.report_module.options selected=$fields.report_module.default}
{/if}
</select>
<input
id="{$fields.report_module.name}-input"
name="{$fields.report_module.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.report_module.name}-image"></button><button type="button"
id="btn-clear-{$fields.report_module.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.report_module.name}-input', '{$fields.report_module.name}');sync_{$fields.report_module.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.report_module.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.report_module.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.report_module.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.report_module.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.report_module.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.report_module.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.report_module.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.report_module.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.report_module.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.report_module.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
<td valign="top" id='_label' width='12.5%' data-total-columns="2" scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='graphs_per_row_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAPHS_PER_ROW' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.graphs_per_row.value) <= 0}
{assign var="value" value=$fields.graphs_per_row.default_value }
{else}
{assign var="value" value=$fields.graphs_per_row.value }
{/if}  
<input type='text' name='{$fields.graphs_per_row.name}' 
id='{$fields.graphs_per_row.name}' size='30'  value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
<td valign="top" id='_label' width='12.5%' data-total-columns="2" scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
</div></div>
{literal}
<style type="text/css">
#EditView_tabs {float: left;}
</style>
{/literal}
<div id="report-editview-footer">
{literal}
<script src="modules/AOR_Reports/js/jqtree/tree.jquery.js"></script>
<script src="modules/AOR_Fields/fieldLines.js"></script>
<script src="modules/AOR_Conditions/conditionLines.js"></script>
<script src="modules/AOR_Charts/chartLines.js"></script>
<link rel="stylesheet" href="include/javascript/jquery/themes/base/jquery-ui.min.css">
<script src="include/javascript/jquery/jquery-ui-min.js"></script>
<script>
$(document).ready(function(){
SUGAR.util.doWhen("typeof $('#fieldTree').tree != 'undefined'", function(){
var $moduleTree = $('#fieldTree').tree({
data: {},
dragAndDrop: false,
selectable: false,
onDragStop: function(node, e,thing){
//                    var target = $(document.elementFromPoint(e.pageX - window.pageXOffset, e.pageY - window.pageYOffset));
//                    if(node.type != 'field'){
//                        return;
//                    }
//                    if(target.closest('#fieldLines').length > 0){
//                        addNodeToFields(node);
//                        updateChartDimensionSelects();
//                    }else if(target.closest('#conditionLines').length > 0){
//                        addNodeToConditions(node);
//                    }
},
onCanMoveTo: function(){
return false;
}
});
function loadTreeData(module, node){
var _node = node;
$.getJSON('index.php',
{
'module' : 'AOR_Reports',
'action' : 'getModuleTreeData',
'aor_module' : module,
'view' : 'JSON'
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
if (typeof module_name == 'undefined' || !module_name) {
module_name = module;
}
if (typeof module_path_display == 'undefined' || !module_path_display) {
module_path_display = module_name;
}
$('#module-name').html('(<span title="' + module_path_display + '">' + module_name + '</span>)');
$('#fieldTreeLeafs').remove();
$('#detailpanel_fields_select').append('<div id="fieldTreeLeafs" class="dragbox aor_dragbox" title="{/literal}{$MOD.LBL_TOOLTIP_DRAG_DROP_ELEMS}{literal}"></div>');
$('#fieldTreeLeafs').tree({
data: treeDataLeafs,
dragAndDrop: true,
selectable: true,
onCanSelectNode: function(node) {
if($('#report-editview-footer .toggle-detailpanel_fields').hasClass('active')) {
dropFieldLine(node);
}
else if($('#report-editview-footer .toggle-detailpanel_conditions').hasClass('active')) {
dropConditionLine(node);
}
},
onDragMove: function() {
$('.drop-area').addClass('highlighted');
},
onDragStop: function(node, e,thing){
$('.drop-area').removeClass('highlighted');
var target = $(document.elementFromPoint(e.pageX - window.pageXOffset, e.pageY - window.pageYOffset));
if(node.type != 'field'){
return;
}
if(target.closest('#fieldLines').length > 0){
dropFieldLine(node);
}else if(target.closest('#conditionLines').length > 0){
var conditionLineTarget = ConditionOrderHandler.getConditionLineByPageEvent(e);
var conditionLineNew = dropConditionLine(node);
if(conditionLineTarget) {
ConditionOrderHandler.putPositionedConditionLines(conditionLineTarget, conditionLineNew);
ConditionOrderHandler.setConditionOrders();
}
ParenthesisHandler.addParenthesisLineIdent();
}
else if(target.closest('.tab-toggler').length > 0) {
target.closest('.tab-toggler').click();
if(target.closest('.tab-toggler').hasClass('toggle-detailpanel_fields')) {
dropFieldLine(node);
}
else if (target.closest('.tab-toggler').hasClass('toggle-detailpanel_conditions')) {
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
$.getJSON('index.php',
{
'module': 'AOR_Reports',
'action': 'getModuleFields',
'aor_module': node.module,
'view': 'JSON'
},
function (fieldData) {
var treeData = [];
for (var field in fieldData) {
if (field) {
treeData.push(
{
id: field,
label: fieldData[field],
'load_on_demand': false,
type: 'field',
module: node.module,
module_path: node.module_path,
module_path_display: node.module_path_display
});
}
}
//$('#fieldTree').tree('loadData',treeData,node);
//node.loaded = true;
//$('#fieldTree').tree('openNode', node);
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
var modulePath = '';
var modulePathDisplay = '';
if(relData[field]['type'] == 'relationship') {
modulePath = field;
if (node) {
modulePath = node.module_path + ":" + field;
modulePathDisplay = node.module_path_display + " : "+relData[field]['module_label'];
}else{
modulePathDisplay = $('#report_module option:selected').text() + ' : ' + relData[field]['module_label'];
}
}else{
if (node) {
modulePath = node.module_path;
modulePathDisplay = node.module_path_display;
}else{
modulePathDisplay = relData[field]['module_label'];
}
}
var newNode = {
id: field,
label: relData[field]['label'],
load_on_demand : true,
type: relData[field]['type'],
module: relData[field]['module'],
module_path: modulePath,
module_path_display: modulePathDisplay};
treeData.push(newNode);
}
}
$('#fieldTree').tree('loadData',treeData, node);
if(node){
node.loaded = true;
$('#fieldTree').tree('openNode', node);
}
else
{
if($('#fieldTree a:first').length)
$('#fieldTree a:first').click();
}
}
$('#fieldTree').on(
'click',
'.jqtree-toggler, .jqtree-title', //
function(event) {
if($(this).hasClass('jqtree-title')) {
$(this).prev().click();
return;
}
//console.log(event);
var node = $(this).closest('li.jqtree_common').data('node');
if(node.loaded) {
}else if(node.type == 'relationship'){
loadTreeData(node.module, node);
}else{
loadTreeLeafData(node);
$('#fieldTree').tree('openNode', node);
}
$('.jqtree-selected').removeClass('jqtree-selected');
$(this).closest('li').addClass('jqtree-selected');
return true;
}
);
var clearTreeDataFields = function() {
$('#module-name').html('');
$('#fieldTreeLeafs').html('');
}
$('#report_module').change(function(){
report_module = $(this).val();
loadTreeData($(this).val());
clearTreeDataFields();
clearFieldLines();
clearConditionLines();
clearChartLines();
});
$('#addChartButton').click(function(){
loadChartLine({});
updateChartDimensionSelects();
});
report_module = $('#report_module').val();
loadTreeData($('#report_module').val());
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
{/literal}
<div class="tab-togglers">
<div class="tab-toggler toggle-detailpanel_fields active">
<h4 class="button">{$MOD.LBL_AOR_FIELDS_SUBPANEL_TITLE}</h4>
</div>
<div class="tab-toggler toggle-detailpanel_conditions ">
<h4 class="button">{$MOD.LBL_AOR_CONDITIONS_SUBPANEL_TITLE}</h4>
</div>
<div class="tab-toggler toggle-detailpanel_charts ">
<h4 class="button">{$MOD.LBL_AOR_CHARTS_SUBPANEL_TITLE}</h4>
</div>
</div>
<div class="clear"></div>
<div class="tab-panels">
<div class="edit view edit508 " id="detailpanel_fields">
<table id="group_display_table" style="display: none;">
<tbody>
<tr>
<td>{$MOD.LBL_MAIN_GROUPS}</td>
<td>
<select id="group_display" name="aor_fields_group_display[0]"></select>
<select id="group_display_1" name="aor_fields_group_display[1]" style="display: none;"></select>
{literal}
<script type="text/javascript">
                            $(function(){
                                setInterval(function(){
                                    if($('#group_display').val() == -1) {
                                        $('#group_display_1').val(-1);
                                        $('#group_display_1').css('display', 'none');
                                    }
                                    else {
                                        if($('#group_display_1').val() == $('#group_display').val()) {
                                            $('#group_display_1').val(-1);
                                        }
                                        $('#group_display_1 option').show();
                                        $('#group_display_1 option[value="' + $('#group_display').val() + '"]').hide();

                                        // todo: temporary remove the secondary select for multi-group report
                                        $('#group_display_1').css('display', 'none');
                                        $('#group_display_1').val(-1);

                                        //$('#group_display_1').css('display', 'block');
                                    }

                                }, 100);
                            });
                        </script>
{/literal}
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
<tr class="parentheses-btn"><td class="condition-sortable-handle">{$MOD.LBL_ADD_PARENTHESIS}</td></tr>
</tbody>
</table>
</div>
<div class="edit view edit508 hidden" id="detailpanel_charts">
<div id="chartLines">
<table>
<thead id="chartHead" style="display: none;">
<tr>
<td></td>
<td>{$MOD.LBL_CHART_TITLE}</td>
<td>{$MOD.LBL_CHART_TYPE}</td>
<td>{$MOD.LBL_CHART_X_FIELD}</td>
<td>{$MOD.LBL_CHART_Y_FIELD}</td>
</tr>
</thead>
<tbody></tbody>
</table>
</div>
<button id="addChartButton" type="button">{$MOD.LBL_ADD_CHART}</button>
</div>
</div>
{literal}
<script type="text/javascript">

    setModuleFieldsPendingFinishedCallback(function(){
        var parenthesisBtnHtml;
        $( "#aor_conditions_body, #aor_condition_parenthesis_btn" ).sortable({
            handle: '.condition-sortable-handle',
            placeholder: "ui-state-highlight",
            cancel: ".parenthesis-line",
            connectWith: ".connectedSortableConditions",
            start: function(event, ui) {
                parenthesisBtnHtml = $('#aor_condition_parenthesis_btn').html();
            },
            stop: function(event, ui) {
                if(event.target.id == 'aor_condition_parenthesis_btn') {
                    $('#aor_condition_parenthesis_btn').html('<tr class="parentheses-btn">' + ui.item.html() + '</tr>');
                    ParenthesisHandler.replaceParenthesisBtns();
                }
                else {
                    if($(this).attr('id') == 'aor_conditions_body' && parenthesisBtnHtml != $('#aor_condition_parenthesis_btn').html()) {
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

        $('#EditView_tabs .clear').remove();
        $('#EditView_tabs').attr('style', 'width: 78%;');

        $( '#aor_condition_parenthesis_btn' ).bind( "sortstart", function (event, ui) {
            ui.helper.css('margin-top', $(window).scrollTop() );
        });
        $( '#aor_condition_parenthesis_btn' ).bind( "sortbeforestop", function (event, ui) {
            ui.helper.css('margin-top', 0 );
        });

        $(window).resize()
        {
            $('div.panel-heading a div').css({
                width: $('div.panel-heading a').width() - 14
            });
        }

        var reportToggler = function(elem) {
            var marker = 'toggle-';
            var classes = $(elem).attr('class').split(' ');
            $('.tab-togglers .tab-toggler').removeClass('active');
            $(elem).addClass('active');
            $('.tab-panels .edit.view').addClass('hidden');
            $.each(classes, function(i, cls){
                if(cls.substring(0, marker.length) == marker) {
                    var panelId = cls.substring(marker.length);
                    $('#'+panelId).removeClass('hidden');
                }
            });
        };

        $('.tab-toggler').click(function(){
            reportToggler(this);
        });


    });
</script>
{/literal}
</div>
<div style="clear: both;"></div>
<div style="display: block; float: none;">

<script language="javascript">
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
{assign var='place' value="_FOOTER"}
<!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_FOOTER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=AOR_Reports'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=AOR_Reports", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
{$PAGINATION}
</td>
</tr>
</table>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script></div><script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {ldelim}
$(document).ready(function() {ldelim}
    $(".collapseLink,.expandLink").click(function (e) {ldelim} e.preventDefault(); {rdelim});
  {rdelim});
{rdelim}
</script>{literal}
<script type="text/javascript">
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'report_module', 'enum', true,'{/literal}{sugar_translate label='LBL_REPORT_MODULE' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'graphs_per_row', 'int', true,'{/literal}{sugar_translate label='LBL_GRAPHS_PER_ROW' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'field_lines', 'function', false,'{/literal}{sugar_translate label='LBL_FIELD_LINES' module='AOR_Reports' for_js=true}{literal}' );
addToValidate('EditView', 'condition_lines', 'function', false,'{/literal}{sugar_translate label='LBL_CONDITION_LINES' module='AOR_Reports' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOR_Reports' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='AOR_Reports' for_js=true}{literal}', 'assigned_user_id' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>{/literal}

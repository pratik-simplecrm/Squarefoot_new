
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
<div class="action_buttons"><input type="button" value="Save" name="button" onclick="var _form = document.getElementById('EditView'); var _onclick=(function(){ldelim}_form.action.value='Save'; if(  check_form('EditView') && checkOppAcc())return true;else return false;{rdelim}()); if(_onclick!==false) _form.submit();" class="button primary" accesskey="S" title="Save [Alt+S]" id="SAVE_HEADER"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=quote_Quote'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=quote_Quote", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBJECT' module='quote_Quote'}{/capture}
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
id='{$fields.name.name}' size='60' 
maxlength='200' 
value='{$value}' title=''      accesskey='7'  >
<td valign="top" id='quote_quote_opportunities_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.quote_quote_opportunities_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.quote_quote_opportunities_name.name}" size="" value="{$fields.quote_quote_opportunities_name.value}" title='' autocomplete="off"   onblur="fetchCust()"	 >
<input type="hidden" name="{$fields.quote_quote_opportunities_name.id_name}" 
id="{$fields.quote_quote_opportunities_name.id_name}" 
value="{$fields.quote_quote_opportunitiesopportunities_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.quote_quote_opportunities_name.name}" id="btn_{$fields.quote_quote_opportunities_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.quote_quote_opportunities_name.module}", 
600, 
400, 
"&account_id="+c_id+"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"quote_quote_opportunitiesopportunities_ida","name":"quote_quote_opportunities_name"}}{/literal}, 
"single", 
true
);' onfocus="fetchCust()"><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.quote_quote_opportunities_name.name}" id="btn_clr_{$fields.quote_quote_opportunities_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.quote_quote_opportunities_name.name}', '{$fields.quote_quote_opportunities_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.quote_quote_opportunities_name.name}']) != 'undefined'",
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
<td valign="top" id='custom_quote_num_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOM_QUOTE_NUM_C' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.custom_quote_num_c.value) <= 0}
{assign var="value" value=$fields.custom_quote_num_c.default_value }
{else}
{assign var="value" value=$fields.custom_quote_num_c.value }
{/if}  
<input type='text' name='{$fields.custom_quote_num_c.name}' 
id='{$fields.custom_quote_num_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='quotation_status_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTATION_STATUS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.quotation_status.name}" 
id="{$fields.quotation_status.name}" 
title=''       
>
{if isset($fields.quotation_status.value) && $fields.quotation_status.value != ''}
{html_options options=$fields.quotation_status.options selected=$fields.quotation_status.value}
{else}
{html_options options=$fields.quotation_status.options selected=$fields.quotation_status.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.quotation_status.options }
{capture name="field_val"}{$fields.quotation_status.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.quotation_status.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.quotation_status.name}" 
id="{$fields.quotation_status.name}" 
title=''          
>
{if isset($fields.quotation_status.value) && $fields.quotation_status.value != ''}
{html_options options=$fields.quotation_status.options selected=$fields.quotation_status.value}
{else}
{html_options options=$fields.quotation_status.options selected=$fields.quotation_status.default}
{/if}
</select>
<input
id="{$fields.quotation_status.name}-input"
name="{$fields.quotation_status.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.quotation_status.name}-image"></button><button type="button"
id="btn-clear-{$fields.quotation_status.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.quotation_status.name}-input', '{$fields.quotation_status.name}');sync_{$fields.quotation_status.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.quotation_status.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.quotation_status.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.quotation_status.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.quotation_status.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.quotation_status.name}{literal}");
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
sync_{/literal}{$fields.quotation_status.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.quotation_status.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.quotation_status.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.quotation_status.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.quotation_status.name}{literal}");
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='currency_id_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}
<span id='currency_id_span'>
{$fields.currency_id.value}</span>
<td valign="top" id='dutyfree_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DUTYFREE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.dutyfree_c.name}" 
id="{$fields.dutyfree_c.name}" 
title=''       
>
{if isset($fields.dutyfree_c.value) && $fields.dutyfree_c.value != ''}
{html_options options=$fields.dutyfree_c.options selected=$fields.dutyfree_c.value}
{else}
{html_options options=$fields.dutyfree_c.options selected=$fields.dutyfree_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.dutyfree_c.options }
{capture name="field_val"}{$fields.dutyfree_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.dutyfree_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.dutyfree_c.name}" 
id="{$fields.dutyfree_c.name}" 
title=''          
>
{if isset($fields.dutyfree_c.value) && $fields.dutyfree_c.value != ''}
{html_options options=$fields.dutyfree_c.options selected=$fields.dutyfree_c.value}
{else}
{html_options options=$fields.dutyfree_c.options selected=$fields.dutyfree_c.default}
{/if}
</select>
<input
id="{$fields.dutyfree_c.name}-input"
name="{$fields.dutyfree_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.dutyfree_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.dutyfree_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.dutyfree_c.name}-input', '{$fields.dutyfree_c.name}');sync_{$fields.dutyfree_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.dutyfree_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.dutyfree_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.dutyfree_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.dutyfree_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.dutyfree_c.name}{literal}");
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
sync_{/literal}{$fields.dutyfree_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.dutyfree_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.dutyfree_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.dutyfree_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.dutyfree_c.name}{literal}");
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='purchase_order_number_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PURCHASE_ORDER_NUMBER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.purchase_order_number_c.value) <= 0}
{assign var="value" value=$fields.purchase_order_number_c.default_value }
{else}
{assign var="value" value=$fields.purchase_order_number_c.value }
{/if}  
<input type='text' name='{$fields.purchase_order_number_c.name}' 
id='{$fields.purchase_order_number_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='valid_until_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VALID_UNTIL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.valid_until_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.valid_until_c.name}" id="{$fields.valid_until_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.valid_until_c.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.valid_until_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.valid_until_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
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
<td valign="top" id='payment_terms_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_TERMS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.payment_terms_c.name}" 
id="{$fields.payment_terms_c.name}" 
title=''       
>
{if isset($fields.payment_terms_c.value) && $fields.payment_terms_c.value != ''}
{html_options options=$fields.payment_terms_c.options selected=$fields.payment_terms_c.value}
{else}
{html_options options=$fields.payment_terms_c.options selected=$fields.payment_terms_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.payment_terms_c.options }
{capture name="field_val"}{$fields.payment_terms_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.payment_terms_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.payment_terms_c.name}" 
id="{$fields.payment_terms_c.name}" 
title=''          
>
{if isset($fields.payment_terms_c.value) && $fields.payment_terms_c.value != ''}
{html_options options=$fields.payment_terms_c.options selected=$fields.payment_terms_c.value}
{else}
{html_options options=$fields.payment_terms_c.options selected=$fields.payment_terms_c.default}
{/if}
</select>
<input
id="{$fields.payment_terms_c.name}-input"
name="{$fields.payment_terms_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.payment_terms_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.payment_terms_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.payment_terms_c.name}-input', '{$fields.payment_terms_c.name}');sync_{$fields.payment_terms_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.payment_terms_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.payment_terms_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.payment_terms_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.payment_terms_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.payment_terms_c.name}{literal}");
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
sync_{/literal}{$fields.payment_terms_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.payment_terms_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.payment_terms_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.payment_terms_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.payment_terms_c.name}{literal}");
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
<td valign="top" id='original_p_o_date_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ORIGINAL_P_O_DATE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.original_p_o_date_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.original_p_o_date_c.name}" id="{$fields.original_p_o_date_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.original_p_o_date_c.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.original_p_o_date_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.original_p_o_date_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
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
<td valign="top" id='branch_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_BRANCH' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.branch_c.name}" 
id="{$fields.branch_c.name}" 
title=''       
>
{if isset($fields.branch_c.value) && $fields.branch_c.value != ''}
{html_options options=$fields.branch_c.options selected=$fields.branch_c.value}
{else}
{html_options options=$fields.branch_c.options selected=$fields.branch_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.branch_c.options }
{capture name="field_val"}{$fields.branch_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.branch_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.branch_c.name}" 
id="{$fields.branch_c.name}" 
title=''          
>
{if isset($fields.branch_c.value) && $fields.branch_c.value != ''}
{html_options options=$fields.branch_c.options selected=$fields.branch_c.value}
{else}
{html_options options=$fields.branch_c.options selected=$fields.branch_c.default}
{/if}
</select>
<input
id="{$fields.branch_c.name}-input"
name="{$fields.branch_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.branch_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.branch_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.branch_c.name}-input', '{$fields.branch_c.name}');sync_{$fields.branch_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.branch_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.branch_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.branch_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.branch_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.branch_c.name}{literal}");
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
sync_{/literal}{$fields.branch_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.branch_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.branch_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.branch_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.branch_c.name}{literal}");
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
<td valign="top" id='customer_type_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOMER_TYPE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.customer_type_c.name}" 
id="{$fields.customer_type_c.name}" 
title=''       
>
{if isset($fields.customer_type_c.value) && $fields.customer_type_c.value != ''}
{html_options options=$fields.customer_type_c.options selected=$fields.customer_type_c.value}
{else}
{html_options options=$fields.customer_type_c.options selected=$fields.customer_type_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.customer_type_c.options }
{capture name="field_val"}{$fields.customer_type_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.customer_type_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.customer_type_c.name}" 
id="{$fields.customer_type_c.name}" 
title=''          
>
{if isset($fields.customer_type_c.value) && $fields.customer_type_c.value != ''}
{html_options options=$fields.customer_type_c.options selected=$fields.customer_type_c.value}
{else}
{html_options options=$fields.customer_type_c.options selected=$fields.customer_type_c.default}
{/if}
</select>
<input
id="{$fields.customer_type_c.name}-input"
name="{$fields.customer_type_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.customer_type_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.customer_type_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.customer_type_c.name}-input', '{$fields.customer_type_c.name}');sync_{$fields.customer_type_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.customer_type_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.customer_type_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.customer_type_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.customer_type_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.customer_type_c.name}{literal}");
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
sync_{/literal}{$fields.customer_type_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.customer_type_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.customer_type_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.customer_type_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.customer_type_c.name}{literal}");
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='copy_address_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_COPY_ADDRESS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.copy_address_c.value) <= 0}
{assign var="value" value=$fields.copy_address_c.default_value }
{else}
{assign var="value" value=$fields.copy_address_c.value }
{/if}  
<input type='text' name='{$fields.copy_address_c.name}' 
id='{$fields.copy_address_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='assigned_user_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='quote_Quote'}{/capture}
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
<td valign="top" id='old_pli_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OLD_PLI' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if empty($fields.old_pli_c.value)}
{assign var="value" value=$fields.old_pli_c.default_value }
{else}
{assign var="value" value=$fields.old_pli_c.value }
{/if}
<textarea  id='{$fields.old_pli_c.name}' name='{$fields.old_pli_c.name}'
rows="4"
cols="20"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
<td valign="top" id='shipping_1_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_1' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.shipping_1_c.value) <= 0}
{assign var="value" value=$fields.shipping_1_c.default_value }
{else}
{assign var="value" value=$fields.shipping_1_c.value }
{/if}  
<input type='text' name='{$fields.shipping_1_c.name}'
id='{$fields.shipping_1_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='pdf_type_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PDF_TYPE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.pdf_type_c.name}" 
id="{$fields.pdf_type_c.name}" 
title=''       
>
{if isset($fields.pdf_type_c.value) && $fields.pdf_type_c.value != ''}
{html_options options=$fields.pdf_type_c.options selected=$fields.pdf_type_c.value}
{else}
{html_options options=$fields.pdf_type_c.options selected=$fields.pdf_type_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.pdf_type_c.options }
{capture name="field_val"}{$fields.pdf_type_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.pdf_type_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.pdf_type_c.name}" 
id="{$fields.pdf_type_c.name}" 
title=''          
>
{if isset($fields.pdf_type_c.value) && $fields.pdf_type_c.value != ''}
{html_options options=$fields.pdf_type_c.options selected=$fields.pdf_type_c.value}
{else}
{html_options options=$fields.pdf_type_c.options selected=$fields.pdf_type_c.default}
{/if}
</select>
<input
id="{$fields.pdf_type_c.name}-input"
name="{$fields.pdf_type_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.pdf_type_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.pdf_type_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.pdf_type_c.name}-input', '{$fields.pdf_type_c.name}');sync_{$fields.pdf_type_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.pdf_type_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.pdf_type_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.pdf_type_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.pdf_type_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.pdf_type_c.name}{literal}");
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
sync_{/literal}{$fields.pdf_type_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.pdf_type_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.pdf_type_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.pdf_type_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.pdf_type_c.name}{literal}");
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
<td valign="top" id='shipping_2_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_2' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.shipping_2_c.value) <= 0}
{assign var="value" value=$fields.shipping_2_c.default_value }
{else}
{assign var="value" value=$fields.shipping_2_c.value }
{/if}  
<input type='text' name='{$fields.shipping_2_c.name}'
id='{$fields.shipping_2_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='approval_status_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_STATUS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.approval_status_c.name}" 
id="{$fields.approval_status_c.name}" 
title=''       
>
{if isset($fields.approval_status_c.value) && $fields.approval_status_c.value != ''}
{html_options options=$fields.approval_status_c.options selected=$fields.approval_status_c.value}
{else}
{html_options options=$fields.approval_status_c.options selected=$fields.approval_status_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.approval_status_c.options }
{capture name="field_val"}{$fields.approval_status_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.approval_status_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.approval_status_c.name}" 
id="{$fields.approval_status_c.name}" 
title=''          
>
{if isset($fields.approval_status_c.value) && $fields.approval_status_c.value != ''}
{html_options options=$fields.approval_status_c.options selected=$fields.approval_status_c.value}
{else}
{html_options options=$fields.approval_status_c.options selected=$fields.approval_status_c.default}
{/if}
</select>
<input
id="{$fields.approval_status_c.name}-input"
name="{$fields.approval_status_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.approval_status_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.approval_status_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.approval_status_c.name}-input', '{$fields.approval_status_c.name}');sync_{$fields.approval_status_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.approval_status_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.approval_status_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.approval_status_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.approval_status_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.approval_status_c.name}{literal}");
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
sync_{/literal}{$fields.approval_status_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.approval_status_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.approval_status_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.approval_status_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.approval_status_c.name}{literal}");
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
<td valign="top" id='approval_issue_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_ISSUE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if empty($fields.approval_issue_c.value)}
{assign var="value" value=$fields.approval_issue_c.default_value }
{else}
{assign var="value" value=$fields.approval_issue_c.value }
{/if}
<textarea  id='{$fields.approval_issue_c.name}' name='{$fields.approval_issue_c.name}'
rows="4"
cols="60"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='unregistered_user_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_UNREGISTERED_USER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strval($fields.unregistered_user_c.value) == "1" || strval($fields.unregistered_user_c.value) == "yes" || strval($fields.unregistered_user_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.unregistered_user_c.name}" value="0"> 
<input type="checkbox" id="{$fields.unregistered_user_c.name}" 
name="{$fields.unregistered_user_c.name}" 
value="1" title='' tabindex="0" {$checked} >
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
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
{*<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
{*<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL14' module='quote_Quote'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL14'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_quote_accounts_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.quote_quote_accounts_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.quote_quote_accounts_name.name}" size="" value="{$fields.quote_quote_accounts_name.value}" title='' autocomplete="off"   onblur="checkUnit()"	 >
<input type="hidden" name="{$fields.quote_quote_accounts_name.id_name}" 
id="{$fields.quote_quote_accounts_name.id_name}" 
value="{$fields.quote_quote_accountsaccounts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.quote_quote_accounts_name.name}" id="btn_{$fields.quote_quote_accounts_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.quote_quote_accounts_name.module}", 
600, 
400, 
"&id_advanced="+c_id+"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"quote_quote_accountsaccounts_ida","name":"quote_quote_accounts_name"}}{/literal}, 
"single", 
true
);' onfocus="checkUnit()"><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.quote_quote_accounts_name.name}" id="btn_clr_{$fields.quote_quote_accounts_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.quote_quote_accounts_name.name}', '{$fields.quote_quote_accounts_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.quote_quote_accounts_name.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='accounts_quote_quote_1_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_QUOTE_QUOTE_1_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.accounts_quote_quote_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.accounts_quote_quote_1_name.name}" size="" value="{$fields.accounts_quote_quote_1_name.value}" title='' autocomplete="off"   onblur="checkUnit1()"	 >
<input type="hidden" name="{$fields.accounts_quote_quote_1_name.id_name}" 
id="{$fields.accounts_quote_quote_1_name.id_name}" 
value="{$fields.accounts_quote_quote_1accounts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts_quote_quote_1_name.name}" id="btn_{$fields.accounts_quote_quote_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.accounts_quote_quote_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"accounts_quote_quote_1accounts_ida","name":"accounts_quote_quote_1_name"}}{/literal}, 
"single", 
true
);' onfocus="checkUnit1()"><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.accounts_quote_quote_1_name.name}" id="btn_clr_{$fields.accounts_quote_quote_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.accounts_quote_quote_1_name.name}', '{$fields.accounts_quote_quote_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.accounts_quote_quote_1_name.name}']) != 'undefined'",
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
<td valign="top" id='contact_name_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_NAME' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.contact_name_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.contact_name_c.name}" size="" value="{$fields.contact_name_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.contact_name_c.id_name}" 
id="{$fields.contact_name_c.id_name}" 
value="{$fields.contact_id_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.contact_name_c.name}" id="btn_{$fields.contact_name_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.contact_name_c.module}", 
600, 
400, 
"&account_name_advanced="+encodeURIComponent(document.getElementById("quote_quote_accounts_name").value)+"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id_c","name":"contact_name_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.contact_name_c.name}" id="btn_clr_{$fields.contact_name_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.contact_name_c.name}', '{$fields.contact_name_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.contact_name_c.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='contact_name_shipping_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_NAME_SHIPPING' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.contact_name_shipping_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.contact_name_shipping_c.name}" size="" value="{$fields.contact_name_shipping_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.contact_name_shipping_c.id_name}" 
id="{$fields.contact_name_shipping_c.id_name}" 
value="{$fields.contact_id1_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.contact_name_shipping_c.name}" id="btn_{$fields.contact_name_shipping_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.contact_name_shipping_c.module}", 
600, 
400, 
"&account_name_advanced="+encodeURIComponent(document.getElementById("accounts_quote_quote_1_name").value)+"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id1_c","name":"contact_name_shipping_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.contact_name_shipping_c.name}" id="btn_clr_{$fields.contact_name_shipping_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.contact_name_shipping_c.name}', '{$fields.contact_name_shipping_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.contact_name_shipping_c.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL14").style.display='none';</script>
{/if}
<div id="detailpanel_3" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
{*<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
{*<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL16' module='quote_Quote'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL16'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='packing_charges_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PACKING_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.packing_charges_c.value) <= 0}
{assign var="value" value=$fields.packing_charges_c.default_value }
{else}
{assign var="value" value=$fields.packing_charges_c.value }
{/if}  
<input type='text' name='{$fields.packing_charges_c.name}'
id='{$fields.packing_charges_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
<td valign="top" id='freight_charges_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FREIGHT_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.freight_charges_c.value) <= 0}
{assign var="value" value=$fields.freight_charges_c.default_value }
{else}
{assign var="value" value=$fields.freight_charges_c.value }
{/if}  
<input type='text' name='{$fields.freight_charges_c.name}'
id='{$fields.freight_charges_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='loading_unloading_charges_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LOADING_UNLOADING_CHARGES_C' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.loading_unloading_charges_c.value) <= 0}
{assign var="value" value=$fields.loading_unloading_charges_c.default_value }
{else}
{assign var="value" value=$fields.loading_unloading_charges_c.value }
{/if}  
<input type='text' name='{$fields.loading_unloading_charges_c.name}'
id='{$fields.loading_unloading_charges_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
<td valign="top" id='other_charges_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.other_charges_c.value) <= 0}
{assign var="value" value=$fields.other_charges_c.default_value }
{else}
{assign var="value" value=$fields.other_charges_c.value }
{/if}  
<input type='text' name='{$fields.other_charges_c.name}'
id='{$fields.other_charges_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='structure_details_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STRUCTURE_DETAILS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.structure_details_c.value) <= 0}
{assign var="value" value=$fields.structure_details_c.default_value }
{else}
{assign var="value" value=$fields.structure_details_c.value }
{/if}  
<input type='text' name='{$fields.structure_details_c.name}'
id='{$fields.structure_details_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL16").style.display='none';</script>
{/if}
<div id="detailpanel_4" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
{*<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
{*<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL12' module='quote_Quote'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL12'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='2'>
{counter name="panelFieldCount"}
<script src="include/SugarFields/Fields/Address/SugarFieldAddress.js?v=bIUEf6JmnnhrcaSYcqaFfw" type="text/javascript"></script>
<fieldset id="Billing_address_c_fieldset">
<legend>Billing Address</legend>
<table width="100%" cellspacing="1" cellpadding="0" border="0" class="edit">
<tbody>
<tr>
<td width="25%" valign="top" scope="row" id="billing_address_c_label"><label for="billing_address_c">Address:</label></td>
<td width="*"><textarea accesskey=""  tabindex="0"  tabindex="0" cols="30" rows="2" maxlength="150" name="billing_address_c" id="billing_address_c">{$fields.billing_address_c.value|nl2br|strip_tags|url2html}</textarea></td>
</tr>
<tr>
<td width="%" scope="row" id="billing_address_city_c_label"><label for="billing_address_city_c">City:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.billing_address_city_c.value}" maxlength="150" size="30" id="billing_address_city_c" name="billing_address_city_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="billing_address_state_c_label"><label for="billing_address_state_c">State:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.billing_address_state_c.value}" maxlength="150" size="30" id="billing_address_state_c" name="billing_address_state_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="billing_address_postalcode_c_label"><label for="billing_address_postalcode_c">Postal Code:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.billing_address_postalcode_c.value}" maxlength="150" size="30" id="billing_address_postalcode_c" name="billing_address_postalcode_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="billing_address_country_c_label"><label for="billing_address_country_c">Country:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.billing_address_country_c.value}" maxlength="150" size="30" id="billing_address_country_c" name="billing_address_country_c"></td>
</tr>
<tr>
<td nowrap="" colspan="2">&nbsp;</td>
</tr>
</tbody></table>
</fieldset>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='2'>
{counter name="panelFieldCount"}
<script src="include/SugarFields/Fields/Address/SugarFieldAddress.js?v=bIUEf6JmnnhrcaSYcqaFfw" type="text/javascript"></script>
<fieldset id="Shipping_address_c_fieldset">
<legend>Shipping Address</legend>
<table width="100%" cellspacing="1" cellpadding="0" border="0" class="edit">
<tbody>
<tr>
<td width="25%" valign="top" scope="row" id="shipping_address_c_label"><label for="shipping_address_c">Shipping Address:</label></td>
<td width="*"><textarea accesskey=""  tabindex="0"  tabindex="0" cols="30" rows="2" maxlength="150" name="shipping_address_c" id="shipping_address_c">{$fields.shipping_address_c.value|nl2br|strip_tags|url2html}</textarea></td>
</tr>
<tr>
<td width="%" scope="row" id="shipping_address_city_c_label"><label for="shipping_address_city_c">City:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.shipping_address_city_c.value}" maxlength="150" size="30" id="shipping_address_city_c" name="shipping_address_city_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="shipping_address_state_c_label"><label for="shipping_address_state_c">State:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.shipping_address_state_c.value}" maxlength="150" size="30" id="shipping_address_state_c" name="shipping_address_state_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="shipping_address_postalcode_c_label"><label for="shipping_address_postalcode_c">Postal Code:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.shipping_address_postalcode_c.value}" maxlength="150" size="30" id="shipping_address_postalcode_c" name="shipping_address_postalcode_c"></td>
</tr>
<tr>
<td width="%" scope="row" id="shipping_address_country_c_label"><label for="shipping_address_country_c">Country:</label></td>
<td><input accesskey=""  tabindex="0"  type="text" tabindex="0" value ="{$fields.shipping_address_country_c.value}" maxlength="150" size="30" id="shipping_address_country_c" name="shipping_address_country_c"></td>
</tr>
<tr>
<td nowrap="" scope="row">Copy address from left:</td>
<td><input accesskey=""  tabindex="0"  type="checkbox" onclick="copyAddressRight();" name="shipping_checkbox" id="shipping_checkbox"></td>
</tr>
</tbody></table>
</fieldset>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL12").style.display='none';</script>
{/if}
<div id="detailpanel_5" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
{*<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
{*<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL11' module='quote_Quote'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL11'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_line_item_layout_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_LINE_ITEM_LAYOUT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.quote_line_item_layout_c.value) <= 0}
{assign var="value" value=$fields.quote_line_item_layout_c.default_value }
{else}
{assign var="value" value=$fields.quote_line_item_layout_c.value }
{/if}  
<input type='text' name='{$fields.quote_line_item_layout_c.name}' 
id='{$fields.quote_line_item_layout_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL11").style.display='none';</script>
{/if}
<div id="detailpanel_6" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(6);">
{*<img border="0" id="detailpanel_6_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(6);">
{*<img border="0" id="detailpanel_6_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL13' module='quote_Quote'}
<script>
document.getElementById('detailpanel_6').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL13'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='sub_total_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SUB_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.sub_total.value) <= 0}
{assign var="value" value=$fields.sub_total.default_value }
{else}
{assign var="value" value=$fields.sub_total.value }
{/if}  
<input type='text' name='{$fields.sub_total.name}' 
id='{$fields.sub_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='discount_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.discount.value) <= 0}
{assign var="value" value=$fields.discount.default_value }
{else}
{assign var="value" value=$fields.discount.value }
{/if}  
<input type='text' name='{$fields.discount.name}' 
id='{$fields.discount.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='discounted_total_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNTED_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.discounted_total.value) <= 0}
{assign var="value" value=$fields.discounted_total.default_value }
{else}
{assign var="value" value=$fields.discounted_total.value }
{/if}  
<input type='text' name='{$fields.discounted_total.name}' 
id='{$fields.discounted_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='shipping_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.shipping_c.value) <= 0}
{assign var="value" value=$fields.shipping_c.default_value }
{else}
{assign var="value" value=$fields.shipping_c.value }
{/if}  
<input type='text' name='{$fields.shipping_c.name}'
id='{$fields.shipping_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=2 }'
title=''
tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='total_tax_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_TAX' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.total_tax.value) <= 0}
{assign var="value" value=$fields.total_tax.default_value }
{else}
{assign var="value" value=$fields.total_tax.value }
{/if}  
<input type='text' name='{$fields.total_tax.name}' 
id='{$fields.total_tax.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='cess_amount_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CESS_AMOUNT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.cess_amount_c.value) <= 0}
{assign var="value" value=$fields.cess_amount_c.default_value }
{else}
{assign var="value" value=$fields.cess_amount_c.value }
{/if}  
<input type='text' name='{$fields.cess_amount_c.name}' 
id='{$fields.cess_amount_c.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='grand_total_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.grand_total.value) <= 0}
{assign var="value" value=$fields.grand_total.default_value }
{else}
{assign var="value" value=$fields.grand_total.value }
{/if}  
<input type='text' name='{$fields.grand_total.name}' 
id='{$fields.grand_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(6, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL13").style.display='none';</script>
{/if}
<div id="detailpanel_7" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(7);">
{*<img border="0" id="detailpanel_7_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(7);">
{*<img border="0" id="detailpanel_7_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL10' module='quote_Quote'}
<script>
document.getElementById('detailpanel_7').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL10'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='terms_conditions_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TERMS_CONDITIONS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.terms_conditions.value)}
{assign var="value" value=$fields.terms_conditions.default_value }
{else}
{assign var="value" value=$fields.terms_conditions.value }
{/if}
<textarea  id='{$fields.terms_conditions.name}' name='{$fields.terms_conditions.name}'
rows="10"
cols="80"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='decleration_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DECLERATION' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.decleration_c.value)}
{assign var="value" value=$fields.decleration_c.default_value }
{else}
{assign var="value" value=$fields.decleration_c.value }
{/if}
<textarea  id='{$fields.decleration_c.name}' name='{$fields.decleration_c.name}'
rows="6"
cols="80"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='certify_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CERTIFY' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.certify_c.value)}
{assign var="value" value=$fields.certify_c.default_value }
{else}
{assign var="value" value=$fields.certify_c.value }
{/if}
<textarea  id='{$fields.certify_c.name}' name='{$fields.certify_c.name}'
rows="6"
cols="80"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='company_vat_details_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_COMPANY_VAT_DETAILS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.company_vat_details_c.value)}
{assign var="value" value=$fields.company_vat_details_c.default_value }
{else}
{assign var="value" value=$fields.company_vat_details_c.value }
{/if}
<textarea  id='{$fields.company_vat_details_c.name}' name='{$fields.company_vat_details_c.name}'
rows="6"
cols="80"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(7, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL10").style.display='none';</script>
{/if}
<div id="detailpanel_8" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(8);">
{*<img border="0" id="detailpanel_8_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">
*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(8);">
{*<img border="0" id="detailpanel_8_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL15' module='quote_Quote'}
<script>
document.getElementById('detailpanel_8').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL15'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='date_entered_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}


{assign var="value" value=09-10-2019 }
<span class="sugar_field" id="{$fields.date_entered.name}">{$value}</span>
<td valign="top" id='date_modified_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}


{assign var="value" value=13-11-2019 }
<span class="sugar_field" id="{$fields.date_modified.name}">{$value}</span>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(8, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL15").style.display='none';</script>
{/if}
</div></div>

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
<div class="action_buttons"><input type="button" value="Save" name="button" onclick="var _form = document.getElementById('EditView'); var _onclick=(function(){ldelim}_form.action.value='Save'; if(  check_form('EditView') && checkOppAcc())return true;else return false;{rdelim}()); if(_onclick!==false) _form.submit();" class="button primary" accesskey="S" title="Save [Alt+S]" id="SAVE_HEADER"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=quote_Quote'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=quote_Quote", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
</td>
</tr>
</table>
</form>
{$set_focus_block}
<!-- Begin Meta-Data Javascript -->
<script type="text/javascript" language="Javascript">function copyAddressRight()  {ldelim} if( shipping_checkbox.checked  ){ldelim} shipping_address_c.value = billing_address_c.value;shipping_address_city_c.value = billing_address_city_c.value;shipping_address_state_c.value = billing_address_state_c.value;shipping_address_postalcode_c.value = billing_address_postalcode_c.value;shipping_address_country_c.value = billing_address_country_c.value; return true; {rdelim} {rdelim} function copyAddressLeft()  {ldelim} billing_address_c.value =shipping_address_c.value;billing_address_city_c.value = shipping_address_city_c.value;billing_address_state_c.value = shipping_address_state_c.value;billing_address_postalcode_c.value =shipping_address_postalcode_c.value;billing_address_country_c.value = shipping_address_country_c.value;return true; {rdelim} </script>
<!-- End Meta-Data Javascript -->
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
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
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_SUBJECT' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_quote_number', 'int', true,'{/literal}{sugar_translate label='LBL_NUMBER' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'type', 'enum', false,'{/literal}{sugar_translate label='LBL_TYPE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'status', 'enum', false,'{/literal}{sugar_translate label='LBL_STATUS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'priority', 'enum', false,'{/literal}{sugar_translate label='LBL_PRIORITY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'resolution', 'enum', false,'{/literal}{sugar_translate label='LBL_RESOLUTION' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'work_log', 'text', false,'{/literal}{sugar_translate label='LBL_WORK_LOG' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quotation_status', 'enum', false,'{/literal}{sugar_translate label='LBL_QUOTATION_STATUS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'discount', 'varchar', false,'{/literal}{sugar_translate label='LBL_DISCOUNT' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'discount_checkbox', 'bool', false,'{/literal}{sugar_translate label='LBL_DISCOUNT_CHECKBOX' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'insurance', 'varchar', false,'{/literal}{sugar_translate label='LBL_INSURANCE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'terms_conditions', 'text', false,'{/literal}{sugar_translate label='LBL_TERMS_CONDITIONS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quotation_category', 'enum', false,'{/literal}{sugar_translate label='LBL_QUOTATION_CATEGORY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'covering_letter', 'text', false,'{/literal}{sugar_translate label='LBL_COVERING_LETTER' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'insurance_checkbox', 'bool', false,'{/literal}{sugar_translate label='LBL_INSURANCE_CHECKBOX' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_type', 'enum', false,'{/literal}{sugar_translate label='LBL_QUOTE_TYPE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quotation_date', 'date', false,'{/literal}{sugar_translate label='LBL_QUOTATION_DATE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'currency', 'currency', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'currency_id', 'currency_id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'freight_charge', 'int', false,'{/literal}{sugar_translate label='LBL_FREIGHT_CHARGE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'spares', 'enum', false,'{/literal}{sugar_translate label='LBL_SPARES' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'is_line', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_LINE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'sub_total', 'currency', false,'{/literal}{sugar_translate label='LBL_SUB_TOTAL' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'discounted_total', 'currency', false,'{/literal}{sugar_translate label='LBL_DISCOUNTED_TOTAL' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'new_subtotal', 'currency', false,'{/literal}{sugar_translate label='LBL_NEW_SUBTOTAL' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'grand_total', 'currency', false,'{/literal}{sugar_translate label='LBL_GRAND_TOTAL' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'total_tax', 'varchar', false,'{/literal}{sugar_translate label='LBL_TOTAL_TAX' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_postalcode_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_POSTALCODE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id_c', 'id', false,'{/literal}{sugar_translate label='LBL_CONTACT_NAME_CONTACT_ID' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'structure_details_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_STRUCTURE_DETAILS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_SHIPPING' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'purchase_order_number_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_PURCHASE_ORDER_NUMBER' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'company_vat_details_c', 'text', false,'{/literal}{sugar_translate label='LBL_COMPANY_VAT_DETAILS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'old_pli_c', 'text', false,'{/literal}{sugar_translate label='LBL_OLD_PLI' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'approval_status_c', 'enum', false,'{/literal}{sugar_translate label='LBL_APPROVAL_STATUS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'payment_terms_c', 'enum', false,'{/literal}{sugar_translate label='LBL_PAYMENT_TERMS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'custom_quote_num_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CUSTOM_QUOTE_NUM_C' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_state_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STATE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'accounts_quote_quote_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNTS_QUOTE_QUOTE_1_FROM_ACCOUNTS_TITLE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_city_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_CITY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_city_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_CITY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'approved_c', 'bool', false,'{/literal}{sugar_translate label='LBL_APPROVED' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_1_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_SHIPPING_1' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'decleration_c', 'text', false,'{/literal}{sugar_translate label='LBL_DECLERATION' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'other_charges_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_OTHER_CHARGES' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'contact_name_c', 'relate', false,'{/literal}{sugar_translate label='LBL_CONTACT_NAME' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_quote_leads_name', 'relate', false,'{/literal}{sugar_translate label='LBL_QUOTE_QUOTE_LEADS_FROM_LEADS_TITLE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'packing_charges_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_PACKING_CHARGES' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_postalcode_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_POSTALCODE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'valid_until_c', 'date', true,'{/literal}{sugar_translate label='LBL_VALID_UNTIL' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'certify_c', 'text', false,'{/literal}{sugar_translate label='LBL_CERTIFY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id1_c', 'id', false,'{/literal}{sugar_translate label='LBL_CONTACT_NAME_SHIPPING_CONTACT_ID' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'team_list_c', 'enum', false,'{/literal}{sugar_translate label='LBL_TEAM_LIST' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_line_item_layout_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_QUOTE_LINE_ITEM_LAYOUT' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'customer_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_CUSTOMER_TYPE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'new_pli_c', 'text', false,'{/literal}{sugar_translate label='LBL_NEW_PLI' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'pdf_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_PDF_TYPE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_country_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_COUNTRY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_state_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STATE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_2_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_SHIPPING_2' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'copy_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_COPY_ADDRESS' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'contact_name_shipping_c', 'relate', false,'{/literal}{sugar_translate label='LBL_CONTACT_NAME_SHIPPING' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'approval_issue_c', 'text', false,'{/literal}{sugar_translate label='LBL_APPROVAL_ISSUE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_quote_opportunities_name', 'relate', true,'{/literal}{sugar_translate label='LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'original_p_o_date_c', 'date', false,'{/literal}{sugar_translate label='LBL_ORIGINAL_P_O_DATE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'quote_quote_accounts_name', 'relate', true,'{/literal}{sugar_translate label='LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_country_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_COUNTRY' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'freight_charges_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_FREIGHT_CHARGES' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'branch_c', 'enum', true,'{/literal}{sugar_translate label='LBL_BRANCH' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'loading_unloading_charges_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_LOADING_UNLOADING_CHARGES_C' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'unregistered_user_c', 'bool', false,'{/literal}{sugar_translate label='LBL_UNREGISTERED_USER' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'cess_amount_c', 'currency', false,'{/literal}{sugar_translate label='LBL_CESS_AMOUNT' module='quote_Quote' for_js=true}{literal}' );
addToValidate('EditView', 'dutyfree_c', 'enum', false,'{/literal}{sugar_translate label='LBL_DUTYFREE' module='quote_Quote' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='quote_Quote' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'accounts_quote_quote_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ACCOUNTS_QUOTE_QUOTE_1_FROM_ACCOUNTS_TITLE' module='quote_Quote' for_js=true}{literal}', 'accounts_quote_quote_1accounts_ida' );
addToValidateBinaryDependency('EditView', 'contact_name_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_CONTACT_NAME' module='quote_Quote' for_js=true}{literal}', 'contact_id_c' );
addToValidateBinaryDependency('EditView', 'contact_name_shipping_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_CONTACT_NAME_SHIPPING' module='quote_Quote' for_js=true}{literal}', 'contact_id1_c' );
addToValidateBinaryDependency('EditView', 'quote_quote_opportunities_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE' module='quote_Quote' for_js=true}{literal}', 'quote_quote_opportunitiesopportunities_ida' );
addToValidateBinaryDependency('EditView', 'quote_quote_accounts_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='quote_Quote' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE' module='quote_Quote' for_js=true}{literal}', 'quote_quote_accountsaccounts_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_quote_quote_opportunities_name']={"form":"EditView","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["quote_quote_opportunities_name","quote_quote_opportunitiesopportunities_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['EditView_quote_quote_accounts_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_quote_quote_accounts_name","quote_quote_accountsaccounts_ida"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["quote_quote_accountsaccounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_accounts_quote_quote_1_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_accounts_quote_quote_1_name","accounts_quote_quote_1accounts_ida"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_quote_quote_1accounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_contact_name_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["contact_name_c","contact_id_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_contact_name_shipping_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["contact_name_shipping_c","contact_id1_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}

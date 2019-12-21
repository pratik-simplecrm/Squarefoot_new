
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
<div class="action_buttons"><input type="button" value="Save" name="button" onclick="var _form = document.getElementById('EditView'); var _onclick=(function(){ldelim}_form.action.value='Save'; if(  check_form('EditView') && check())return true;else return false;{rdelim}()); if(_onclick!==false) _form.submit();" class="button primary" accesskey="S" title="Save [Alt+S]"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Accounts'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Accounts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
class="yui-navset"
>

<ul class="yui-nav">
<li class="selected"><a id="tab0" href="javascript:void(0)"><em>{sugar_translate label='LBL_ACCOUNT_INFORMATION' module='Accounts'}</em></a></li>
<li class="selected"><a id="tab1" href="javascript:void(1)"><em>{sugar_translate label='LBL_PANEL_ADVANCED' module='Accounts'}</em></a></li>
</ul>
<div class="yui-content">
<div id='tabcontent0'>
<div id="detailpanel_1" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_ACCOUNT_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Accounts'}{/capture}
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
maxlength='150' 
value='{$value}' title=''      accesskey='7'  >
<td valign="top" id='customer_id_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOMER_ID' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.customer_id_c.value) <= 0}
{assign var="value" value=$fields.customer_id_c.default_value }
{else}
{assign var="value" value=$fields.customer_id_c.value }
{/if}  
<input type='text' name='{$fields.customer_id_c.name}' 
id='{$fields.customer_id_c.name}' size='30' 
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
<td valign="top" id='phone_office_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.phone_office.value) <= 0}
{assign var="value" value=$fields.phone_office.default_value }
{else}
{assign var="value" value=$fields.phone_office.value }
{/if}  
<input type='text' name='{$fields.phone_office.name}' id='{$fields.phone_office.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
<td valign="top" id='phone_fax_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.phone_fax.value) <= 0}
{assign var="value" value=$fields.phone_fax.default_value }
{else}
{assign var="value" value=$fields.phone_fax.value }
{/if}  
<input type='text' name='{$fields.phone_fax.name}' id='{$fields.phone_fax.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='website_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WEBSITE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if !empty($fields.website.value)}
<input type='text' name='{$fields.website.name}' id='{$fields.website.name}' size='30' 
maxlength='255' value='{$fields.website.value}' title='' tabindex='0'  >
{else}
<input type='text' name='{$fields.website.name}' id='{$fields.website.name}' size='30' 
maxlength='255'	   	   {if $displayView=='advanced_search'||$displayView=='basic_search'}value=''{else}value='http://'{/if} 
title='' tabindex='0'  >
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='2'>
{counter name="panelFieldCount"}

<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Address/SugarFieldAddress.js"}'></script>
<fieldset id='BILLING_address_fieldset'>
<legend>{sugar_translate label='LBL_BILLING_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="billing_address_street_label" width='25%' scope='row' >
<label for="billing_address_street">{sugar_translate label='LBL_BILLING_STREET' module=''}:</label>
{if $fields.billing_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<textarea id="billing_address_street" name="billing_address_street" maxlength="150" rows="2" cols="30" tabindex="0">{$fields.billing_address_street.value}</textarea>
</td>
</tr>
<tr>
<td id="billing_address_city_label" width='%' scope='row' >
<label for="billing_address_city">{sugar_translate label='LBL_CITY' module=''}:
{if $fields.billing_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_city" id="billing_address_city" size="30" maxlength='150' value='{$fields.billing_address_city.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="billing_address_state_label" width='%' scope='row' >
<label for="billing_address_state">{sugar_translate label='LBL_STATE' module=''}:</label>
{if $fields.billing_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_state" id="billing_address_state" size="30" maxlength='150' value='{$fields.billing_address_state.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="billing_address_postalcode_label" width='%' scope='row' >
<label for="billing_address_postalcode">{sugar_translate label='LBL_POSTAL_CODE' module=''}:</label>
{if $fields.billing_address_postalcode.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_postalcode" id="billing_address_postalcode" size="30" maxlength='150' value='{$fields.billing_address_postalcode.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="billing_address_country_label" width='%' scope='row' >
<label for="billing_address_country">{sugar_translate label='LBL_COUNTRY' module=''}:</label>
{if $fields.billing_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_country" id="billing_address_country" size="30" maxlength='150' value='{$fields.billing_address_country.value}' tabindex="0">
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
		billing_address = new SUGAR.AddressField("billing_checkbox",'', 'billing');
	{rdelim});
</script>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" colspan='2'>
{counter name="panelFieldCount"}

<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Address/SugarFieldAddress.js"}'></script>
<fieldset id='SHIPPING_address_fieldset'>
<legend>{sugar_translate label='LBL_SHIPPING_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="shipping_address_street_label" width='25%' scope='row' >
<label for="shipping_address_street">{sugar_translate label='LBL_SHIPPING_STREET' module=''}:</label>
{if $fields.shipping_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<textarea id="shipping_address_street" name="shipping_address_street" maxlength="150" rows="2" cols="30" tabindex="0">{$fields.shipping_address_street.value}</textarea>
</td>
</tr>
<tr>
<td id="shipping_address_city_label" width='%' scope='row' >
<label for="shipping_address_city">{sugar_translate label='LBL_CITY' module=''}:
{if $fields.shipping_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_city" id="shipping_address_city" size="30" maxlength='150' value='{$fields.shipping_address_city.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="shipping_address_state_label" width='%' scope='row' >
<label for="shipping_address_state">{sugar_translate label='LBL_STATE' module=''}:</label>
{if $fields.shipping_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_state" id="shipping_address_state" size="30" maxlength='150' value='{$fields.shipping_address_state.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="shipping_address_postalcode_label" width='%' scope='row' >
<label for="shipping_address_postalcode">{sugar_translate label='LBL_POSTAL_CODE' module=''}:</label>
{if $fields.shipping_address_postalcode.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_postalcode" id="shipping_address_postalcode" size="30" maxlength='150' value='{$fields.shipping_address_postalcode.value}' tabindex="0">
</td>
</tr>
<tr>
<td id="shipping_address_country_label" width='%' scope='row' >
<label for="shipping_address_country">{sugar_translate label='LBL_COUNTRY' module=''}:</label>
{if $fields.shipping_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_country" id="shipping_address_country" size="30" maxlength='150' value='{$fields.shipping_address_country.value}' tabindex="0">
</td>
</tr>
<tr>
<td scope='row' NOWRAP>
{sugar_translate label='LBL_COPY_ADDRESS_FROM_LEFT' module=''}:
</td>
<td>
<input id="shipping_checkbox" name="shipping_checkbox" type="checkbox" onclick="shipping_address.syncFields();">
</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
		shipping_address = new SUGAR.AddressField("shipping_checkbox",'billing', 'shipping');
	{rdelim});
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='email1_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}</span>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='description_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}
<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
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
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
{/if}
</div>    <div id='tabcontent1'>
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PANEL_ADVANCED'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='annual_revenue_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ANNUAL_REVENUE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.annual_revenue.value) <= 0}
{assign var="value" value=$fields.annual_revenue.default_value }
{else}
{assign var="value" value=$fields.annual_revenue.value }
{/if}  
<input type='text' name='{$fields.annual_revenue.name}' 
id='{$fields.annual_revenue.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
<td valign="top" id='parent_name_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MEMBER_OF' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.parent_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.parent_name.name}" size="" value="{$fields.parent_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.parent_name.id_name}" 
id="{$fields.parent_name.id_name}" 
value="{$fields.parent_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.parent_name.name}" id="btn_{$fields.parent_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.parent_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.parent_name.name}" id="btn_clr_{$fields.parent_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.parent_name.name}', '{$fields.parent_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.parent_name.name}']) != 'undefined'",
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
<td valign="top" id='account_type_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.account_type.name}" 
id="{$fields.account_type.name}" 
title=''       
>
{if isset($fields.account_type.value) && $fields.account_type.value != ''}
{html_options options=$fields.account_type.options selected=$fields.account_type.value}
{else}
{html_options options=$fields.account_type.options selected=$fields.account_type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.account_type.options }
{capture name="field_val"}{$fields.account_type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.account_type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.account_type.name}" 
id="{$fields.account_type.name}" 
title=''          
>
{if isset($fields.account_type.value) && $fields.account_type.value != ''}
{html_options options=$fields.account_type.options selected=$fields.account_type.value}
{else}
{html_options options=$fields.account_type.options selected=$fields.account_type.default}
{/if}
</select>
<input
id="{$fields.account_type.name}-input"
name="{$fields.account_type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.account_type.name}-image"></button><button type="button"
id="btn-clear-{$fields.account_type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.account_type.name}-input', '{$fields.account_type.name}');sync_{$fields.account_type.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.account_type.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.account_type.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.account_type.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.account_type.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.account_type.name}{literal}");
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
sync_{/literal}{$fields.account_type.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.account_type.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.account_type.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.account_type.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.account_type.name}{literal}");
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
<td valign="top" id='educational_institution_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EDUCATIONAL_INSTITUTION' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.educational_institution_c.value) == "1" || strval($fields.educational_institution_c.value) == "yes" || strval($fields.educational_institution_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.educational_institution_c.name}" value="0"> 
<input type="checkbox" id="{$fields.educational_institution_c.name}" 
name="{$fields.educational_institution_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='pharmaceutical_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PHARMACEUTICAL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.pharmaceutical_c.value) == "1" || strval($fields.pharmaceutical_c.value) == "yes" || strval($fields.pharmaceutical_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.pharmaceutical_c.name}" value="0"> 
<input type="checkbox" id="{$fields.pharmaceutical_c.name}" 
name="{$fields.pharmaceutical_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='hospital_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_HOSPITAL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.hospital_c.value) == "1" || strval($fields.hospital_c.value) == "yes" || strval($fields.hospital_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hospital_c.name}" value="0"> 
<input type="checkbox" id="{$fields.hospital_c.name}" 
name="{$fields.hospital_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='builder_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_BUILDER' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.builder_c.value) == "1" || strval($fields.builder_c.value) == "yes" || strval($fields.builder_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.builder_c.name}" value="0"> 
<input type="checkbox" id="{$fields.builder_c.name}" 
name="{$fields.builder_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='contractor_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTRACTOR' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.contractor_c.value) == "1" || strval($fields.contractor_c.value) == "yes" || strval($fields.contractor_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.contractor_c.name}" value="0"> 
<input type="checkbox" id="{$fields.contractor_c.name}" 
name="{$fields.contractor_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='hotel_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_HOTEL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.hotel_c.value) == "1" || strval($fields.hotel_c.value) == "yes" || strval($fields.hotel_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hotel_c.name}" value="0"> 
<input type="checkbox" id="{$fields.hotel_c.name}" 
name="{$fields.hotel_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='retail_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RETAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.retail_c.value) == "1" || strval($fields.retail_c.value) == "yes" || strval($fields.retail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.retail_c.name}" value="0"> 
<input type="checkbox" id="{$fields.retail_c.name}" 
name="{$fields.retail_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='sports_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SPORTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.sports_c.value) == "1" || strval($fields.sports_c.value) == "yes" || strval($fields.sports_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.sports_c.name}" value="0"> 
<input type="checkbox" id="{$fields.sports_c.name}" 
name="{$fields.sports_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='others_c_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHERS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
{counter name="panelFieldCount"}

{if strval($fields.others_c.value) == "1" || strval($fields.others_c.value) == "yes" || strval($fields.others_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.others_c.name}" value="0"> 
<input type="checkbox" id="{$fields.others_c.name}" 
name="{$fields.others_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' data-total-columns="1" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="1" colspan='3'>
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
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
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
{sugar_translate label='LBL_EVENT_FACILITATOR_CO' module='Accounts'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EVENT_FACILITATOR_CO'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='fac_rating_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.fac_rating_c.name}" 
id="{$fields.fac_rating_c.name}" 
title=''       
>
{if isset($fields.fac_rating_c.value) && $fields.fac_rating_c.value != ''}
{html_options options=$fields.fac_rating_c.options selected=$fields.fac_rating_c.value}
{else}
{html_options options=$fields.fac_rating_c.options selected=$fields.fac_rating_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.fac_rating_c.options }
{capture name="field_val"}{$fields.fac_rating_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.fac_rating_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.fac_rating_c.name}" 
id="{$fields.fac_rating_c.name}" 
title=''          
>
{if isset($fields.fac_rating_c.value) && $fields.fac_rating_c.value != ''}
{html_options options=$fields.fac_rating_c.options selected=$fields.fac_rating_c.value}
{else}
{html_options options=$fields.fac_rating_c.options selected=$fields.fac_rating_c.default}
{/if}
</select>
<input
id="{$fields.fac_rating_c.name}-input"
name="{$fields.fac_rating_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.fac_rating_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.fac_rating_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.fac_rating_c.name}-input', '{$fields.fac_rating_c.name}');sync_{$fields.fac_rating_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.fac_rating_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.fac_rating_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.fac_rating_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.fac_rating_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.fac_rating_c.name}{literal}");
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
sync_{/literal}{$fields.fac_rating_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.fac_rating_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.fac_rating_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.fac_rating_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.fac_rating_c.name}{literal}");
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
<td valign="top" id='fac_contract_status_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.fac_contract_status_c.name}" 
id="{$fields.fac_contract_status_c.name}" 
title=''       
>
{if isset($fields.fac_contract_status_c.value) && $fields.fac_contract_status_c.value != ''}
{html_options options=$fields.fac_contract_status_c.options selected=$fields.fac_contract_status_c.value}
{else}
{html_options options=$fields.fac_contract_status_c.options selected=$fields.fac_contract_status_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.fac_contract_status_c.options }
{capture name="field_val"}{$fields.fac_contract_status_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.fac_contract_status_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.fac_contract_status_c.name}" 
id="{$fields.fac_contract_status_c.name}" 
title=''          
>
{if isset($fields.fac_contract_status_c.value) && $fields.fac_contract_status_c.value != ''}
{html_options options=$fields.fac_contract_status_c.options selected=$fields.fac_contract_status_c.value}
{else}
{html_options options=$fields.fac_contract_status_c.options selected=$fields.fac_contract_status_c.default}
{/if}
</select>
<input
id="{$fields.fac_contract_status_c.name}-input"
name="{$fields.fac_contract_status_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.fac_contract_status_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.fac_contract_status_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.fac_contract_status_c.name}-input', '{$fields.fac_contract_status_c.name}');sync_{$fields.fac_contract_status_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.fac_contract_status_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.fac_contract_status_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.fac_contract_status_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.fac_contract_status_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.fac_contract_status_c.name}{literal}");
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
sync_{/literal}{$fields.fac_contract_status_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.fac_contract_status_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.fac_contract_status_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.fac_contract_status_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.fac_contract_status_c.name}{literal}");
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
<td valign="top" id='facilitate_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FACILITATE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.facilitate_c.value) == "1" || strval($fields.facilitate_c.value) == "yes" || strval($fields.facilitate_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.facilitate_c.name}" value="0"> 
<input type="checkbox" id="{$fields.facilitate_c.name}" 
name="{$fields.facilitate_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='facilitate_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FACILITATE_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.facilitate_fees_c.value) <= 0}
{assign var="value" value=$fields.facilitate_fees_c.default_value }
{else}
{assign var="value" value=$fields.facilitate_fees_c.value }
{/if}  
<input type='text' name='{$fields.facilitate_fees_c.name}' 
id='{$fields.facilitate_fees_c.name}' size='30' 
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
<td valign="top" id='consult_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONSULT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.consult_c.value) == "1" || strval($fields.consult_c.value) == "yes" || strval($fields.consult_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.consult_c.name}" value="0"> 
<input type="checkbox" id="{$fields.consult_c.name}" 
name="{$fields.consult_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='consult_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONSULT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.consult_fees_c.value) <= 0}
{assign var="value" value=$fields.consult_fees_c.default_value }
{else}
{assign var="value" value=$fields.consult_fees_c.value }
{/if}  
<input type='text' name='{$fields.consult_fees_c.name}' 
id='{$fields.consult_fees_c.name}' size='30' 
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
<td valign="top" id='implement_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPLEMENT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.implement_c.value) == "1" || strval($fields.implement_c.value) == "yes" || strval($fields.implement_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.implement_c.name}" value="0"> 
<input type="checkbox" id="{$fields.implement_c.name}" 
name="{$fields.implement_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='implement_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPLEMENT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.implement_fees_c.value) <= 0}
{assign var="value" value=$fields.implement_fees_c.default_value }
{else}
{assign var="value" value=$fields.implement_fees_c.value }
{/if}  
<input type='text' name='{$fields.implement_fees_c.name}' 
id='{$fields.implement_fees_c.name}' size='30' 
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
<td valign="top" id='own_facil_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OWN_FACIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.own_facil_c.value) == "1" || strval($fields.own_facil_c.value) == "yes" || strval($fields.own_facil_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.own_facil_c.name}" value="0"> 
<input type="checkbox" id="{$fields.own_facil_c.name}" 
name="{$fields.own_facil_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='fac_rent_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_RENT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.fac_rent_fees_c.value) <= 0}
{assign var="value" value=$fields.fac_rent_fees_c.default_value }
{else}
{assign var="value" value=$fields.fac_rent_fees_c.value }
{/if}  
<input type='text' name='{$fields.fac_rent_fees_c.name}' 
id='{$fields.fac_rent_fees_c.name}' size='30' 
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
<td valign="top" id='travel_reimb_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TRAVEL_REIMB' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.travel_reimb_c.value) == "1" || strval($fields.travel_reimb_c.value) == "yes" || strval($fields.travel_reimb_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.travel_reimb_c.name}" value="0"> 
<input type="checkbox" id="{$fields.travel_reimb_c.name}" 
name="{$fields.travel_reimb_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='travel_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TRAVEL_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.travel_fees_c.value) <= 0}
{assign var="value" value=$fields.travel_fees_c.default_value }
{else}
{assign var="value" value=$fields.travel_fees_c.value }
{/if}  
<input type='text' name='{$fields.travel_fees_c.name}' 
id='{$fields.travel_fees_c.name}' size='30' 
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
<td valign="top" id='reference1_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE1' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.reference1_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.reference1_c.name}" size="" value="{$fields.reference1_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.reference1_c.id_name}" 
id="{$fields.reference1_c.id_name}" 
value="{$fields.contact_id1_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.reference1_c.name}" id="btn_{$fields.reference1_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.reference1_c.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id1_c","name":"reference1_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.reference1_c.name}" id="btn_clr_{$fields.reference1_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.reference1_c.name}', '{$fields.reference1_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.reference1_c.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='reference1_comments_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE1_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.reference1_comments_c.value) <= 0}
{assign var="value" value=$fields.reference1_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference1_comments_c.value }
{/if}  
<input type='text' name='{$fields.reference1_comments_c.name}' 
id='{$fields.reference1_comments_c.name}' size='30' 
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
<td valign="top" id='reference2_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE2' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.reference2_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.reference2_c.name}" size="" value="{$fields.reference2_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.reference2_c.id_name}" 
id="{$fields.reference2_c.id_name}" 
value="{$fields.contact_id2_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.reference2_c.name}" id="btn_{$fields.reference2_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.reference2_c.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id2_c","name":"reference2_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.reference2_c.name}" id="btn_clr_{$fields.reference2_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.reference2_c.name}', '{$fields.reference2_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.reference2_c.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='reference2_comments_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE2_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.reference2_comments_c.value) <= 0}
{assign var="value" value=$fields.reference2_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference2_comments_c.value }
{/if}  
<input type='text' name='{$fields.reference2_comments_c.name}' 
id='{$fields.reference2_comments_c.name}' size='30' 
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
<td valign="top" id='reference3_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE3' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.reference3_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.reference3_c.name}" size="" value="{$fields.reference3_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.reference3_c.id_name}" 
id="{$fields.reference3_c.id_name}" 
value="{$fields.contact_id3_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.reference3_c.name}" id="btn_{$fields.reference3_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.reference3_c.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id3_c","name":"reference3_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.reference3_c.name}" id="btn_clr_{$fields.reference3_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.reference3_c.name}', '{$fields.reference3_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.reference3_c.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='reference3_comments_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE3_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.reference3_comments_c.value) <= 0}
{assign var="value" value=$fields.reference3_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference3_comments_c.value }
{/if}  
<input type='text' name='{$fields.reference3_comments_c.name}' 
id='{$fields.reference3_comments_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_FACILITATOR_CO").style.display='none';</script>
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
{sugar_translate label='LBL_EVENT_VENUE' module='Accounts'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EVENT_VENUE'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='venue_rating_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.venue_rating_c.name}" 
id="{$fields.venue_rating_c.name}" 
title=''       
>
{if isset($fields.venue_rating_c.value) && $fields.venue_rating_c.value != ''}
{html_options options=$fields.venue_rating_c.options selected=$fields.venue_rating_c.value}
{else}
{html_options options=$fields.venue_rating_c.options selected=$fields.venue_rating_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.venue_rating_c.options }
{capture name="field_val"}{$fields.venue_rating_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.venue_rating_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.venue_rating_c.name}" 
id="{$fields.venue_rating_c.name}" 
title=''          
>
{if isset($fields.venue_rating_c.value) && $fields.venue_rating_c.value != ''}
{html_options options=$fields.venue_rating_c.options selected=$fields.venue_rating_c.value}
{else}
{html_options options=$fields.venue_rating_c.options selected=$fields.venue_rating_c.default}
{/if}
</select>
<input
id="{$fields.venue_rating_c.name}-input"
name="{$fields.venue_rating_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.venue_rating_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.venue_rating_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.venue_rating_c.name}-input', '{$fields.venue_rating_c.name}');sync_{$fields.venue_rating_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.venue_rating_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.venue_rating_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.venue_rating_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.venue_rating_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.venue_rating_c.name}{literal}");
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
sync_{/literal}{$fields.venue_rating_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.venue_rating_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.venue_rating_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.venue_rating_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.venue_rating_c.name}{literal}");
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
<td valign="top" id='ven_contract_status_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VEN_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.ven_contract_status_c.name}" 
id="{$fields.ven_contract_status_c.name}" 
title=''       
>
{if isset($fields.ven_contract_status_c.value) && $fields.ven_contract_status_c.value != ''}
{html_options options=$fields.ven_contract_status_c.options selected=$fields.ven_contract_status_c.value}
{else}
{html_options options=$fields.ven_contract_status_c.options selected=$fields.ven_contract_status_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.ven_contract_status_c.options }
{capture name="field_val"}{$fields.ven_contract_status_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.ven_contract_status_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.ven_contract_status_c.name}" 
id="{$fields.ven_contract_status_c.name}" 
title=''          
>
{if isset($fields.ven_contract_status_c.value) && $fields.ven_contract_status_c.value != ''}
{html_options options=$fields.ven_contract_status_c.options selected=$fields.ven_contract_status_c.value}
{else}
{html_options options=$fields.ven_contract_status_c.options selected=$fields.ven_contract_status_c.default}
{/if}
</select>
<input
id="{$fields.ven_contract_status_c.name}-input"
name="{$fields.ven_contract_status_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.ven_contract_status_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.ven_contract_status_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.ven_contract_status_c.name}-input', '{$fields.ven_contract_status_c.name}');sync_{$fields.ven_contract_status_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.ven_contract_status_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.ven_contract_status_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.ven_contract_status_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.ven_contract_status_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.ven_contract_status_c.name}{literal}");
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
sync_{/literal}{$fields.ven_contract_status_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.ven_contract_status_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.ven_contract_status_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.ven_contract_status_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.ven_contract_status_c.name}{literal}");
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
<td valign="top" id='venue_type_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_TYPE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.venue_type_c.name}" 
id="{$fields.venue_type_c.name}" 
title=''       
>
{if isset($fields.venue_type_c.value) && $fields.venue_type_c.value != ''}
{html_options options=$fields.venue_type_c.options selected=$fields.venue_type_c.value}
{else}
{html_options options=$fields.venue_type_c.options selected=$fields.venue_type_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.venue_type_c.options }
{capture name="field_val"}{$fields.venue_type_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.venue_type_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.venue_type_c.name}" 
id="{$fields.venue_type_c.name}" 
title=''          
>
{if isset($fields.venue_type_c.value) && $fields.venue_type_c.value != ''}
{html_options options=$fields.venue_type_c.options selected=$fields.venue_type_c.value}
{else}
{html_options options=$fields.venue_type_c.options selected=$fields.venue_type_c.default}
{/if}
</select>
<input
id="{$fields.venue_type_c.name}-input"
name="{$fields.venue_type_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.venue_type_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.venue_type_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.venue_type_c.name}-input', '{$fields.venue_type_c.name}');sync_{$fields.venue_type_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.venue_type_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.venue_type_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.venue_type_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.venue_type_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.venue_type_c.name}{literal}");
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
sync_{/literal}{$fields.venue_type_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.venue_type_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.venue_type_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.venue_type_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.venue_type_c.name}{literal}");
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
<td valign="top" id='venue_restrictions_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_RESTRICTIONS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.venue_restrictions_c.value) <= 0}
{assign var="value" value=$fields.venue_restrictions_c.default_value }
{else}
{assign var="value" value=$fields.venue_restrictions_c.value }
{/if}  
<input type='text' name='{$fields.venue_restrictions_c.name}' 
id='{$fields.venue_restrictions_c.name}' size='30' 
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
<td valign="top" id='will_book_block_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WILL_BOOK_BLOCK' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.will_book_block_c.value) == "1" || strval($fields.will_book_block_c.value) == "yes" || strval($fields.will_book_block_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.will_book_block_c.name}" value="0"> 
<input type="checkbox" id="{$fields.will_book_block_c.name}" 
name="{$fields.will_book_block_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='num_guest_rooms_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NUM_GUEST_ROOMS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.num_guest_rooms_c.value) <= 0}
{assign var="value" value=$fields.num_guest_rooms_c.default_value }
{else}
{assign var="value" value=$fields.num_guest_rooms_c.value }
{/if}  
<input type='text' name='{$fields.num_guest_rooms_c.name}' 
id='{$fields.num_guest_rooms_c.name}' size='30' 
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
<td valign="top" id='corporate_rate_avail_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CORPORATE_RATE_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.corporate_rate_avail_c.value) == "1" || strval($fields.corporate_rate_avail_c.value) == "yes" || strval($fields.corporate_rate_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.corporate_rate_avail_c.name}" value="0"> 
<input type="checkbox" id="{$fields.corporate_rate_avail_c.name}" 
name="{$fields.corporate_rate_avail_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='corporate_rate_value_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CORPORATE_RATE_VALUE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.corporate_rate_value_c.value) <= 0}
{assign var="value" value=$fields.corporate_rate_value_c.default_value }
{else}
{assign var="value" value=$fields.corporate_rate_value_c.value }
{/if}  
<input type='text' name='{$fields.corporate_rate_value_c.name}' 
id='{$fields.corporate_rate_value_c.name}' size='30' 
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
<td valign="top" id='reqd_deposit_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REQD_DEPOSIT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.reqd_deposit_c.value) == "1" || strval($fields.reqd_deposit_c.value) == "yes" || strval($fields.reqd_deposit_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.reqd_deposit_c.name}" value="0"> 
<input type="checkbox" id="{$fields.reqd_deposit_c.name}" 
name="{$fields.reqd_deposit_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='deposit_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPOSIT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.deposit_fees_c.value) <= 0}
{assign var="value" value=$fields.deposit_fees_c.default_value }
{else}
{assign var="value" value=$fields.deposit_fees_c.value }
{/if}  
<input type='text' name='{$fields.deposit_fees_c.name}' 
id='{$fields.deposit_fees_c.name}' size='30' 
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
<td valign="top" id='parking_avail_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PARKING_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.parking_avail_c.value) == "1" || strval($fields.parking_avail_c.value) == "yes" || strval($fields.parking_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.parking_avail_c.name}" value="0"> 
<input type="checkbox" id="{$fields.parking_avail_c.name}" 
name="{$fields.parking_avail_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='parking_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PARKING_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.parking_fees_c.value) <= 0}
{assign var="value" value=$fields.parking_fees_c.default_value }
{else}
{assign var="value" value=$fields.parking_fees_c.value }
{/if}  
<input type='text' name='{$fields.parking_fees_c.name}' 
id='{$fields.parking_fees_c.name}' size='30' 
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
<td valign="top" id='av_avail_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.av_avail_c.value) == "1" || strval($fields.av_avail_c.value) == "yes" || strval($fields.av_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.av_avail_c.name}" value="0"> 
<input type="checkbox" id="{$fields.av_avail_c.name}" 
name="{$fields.av_avail_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='av_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.av_fees_c.value) <= 0}
{assign var="value" value=$fields.av_fees_c.default_value }
{else}
{assign var="value" value=$fields.av_fees_c.value }
{/if}  
<input type='text' name='{$fields.av_fees_c.name}' 
id='{$fields.av_fees_c.name}' size='30' 
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
<td valign="top" id='exclusive_av_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EXCLUSIVE_AV' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.exclusive_av_c.value) == "1" || strval($fields.exclusive_av_c.value) == "yes" || strval($fields.exclusive_av_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.exclusive_av_c.name}" value="0"> 
<input type="checkbox" id="{$fields.exclusive_av_c.name}" 
name="{$fields.exclusive_av_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='av_contact_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_CONTACT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.av_contact_c.name}" class="sqsEnabled" tabindex="0" id="{$fields.av_contact_c.name}" size="" value="{$fields.av_contact_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.av_contact_c.id_name}" 
id="{$fields.av_contact_c.id_name}" 
value="{$fields.contact_id4_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.av_contact_c.name}" id="btn_{$fields.av_contact_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.av_contact_c.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id4_c","name":"av_contact_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.av_contact_c.name}" id="btn_clr_{$fields.av_contact_c.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.av_contact_c.name}', '{$fields.av_contact_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.av_contact_c.name}']) != 'undefined'",
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
<td valign="top" id='flip_charts_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FLIP_CHARTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.flip_charts_c.value) == "1" || strval($fields.flip_charts_c.value) == "yes" || strval($fields.flip_charts_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.flip_charts_c.name}" value="0"> 
<input type="checkbox" id="{$fields.flip_charts_c.name}" 
name="{$fields.flip_charts_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='flip_chart_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FLIP_CHART_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.flip_chart_fees_c.value) <= 0}
{assign var="value" value=$fields.flip_chart_fees_c.default_value }
{else}
{assign var="value" value=$fields.flip_chart_fees_c.value }
{/if}  
<input type='text' name='{$fields.flip_chart_fees_c.name}' 
id='{$fields.flip_chart_fees_c.name}' size='30' 
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
<td valign="top" id='internet_avail_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_INTERNET_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.internet_avail_c.value) == "1" || strval($fields.internet_avail_c.value) == "yes" || strval($fields.internet_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.internet_avail_c.name}" value="0"> 
<input type="checkbox" id="{$fields.internet_avail_c.name}" 
name="{$fields.internet_avail_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='internet_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_INTERNET_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.internet_fees_c.value) <= 0}
{assign var="value" value=$fields.internet_fees_c.default_value }
{else}
{assign var="value" value=$fields.internet_fees_c.value }
{/if}  
<input type='text' name='{$fields.internet_fees_c.name}' 
id='{$fields.internet_fees_c.name}' size='30' 
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
<td valign="top" id='receiving_dock_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEIVING_DOCK' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.receiving_dock_c.value) == "1" || strval($fields.receiving_dock_c.value) == "yes" || strval($fields.receiving_dock_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.receiving_dock_c.name}" value="0"> 
<input type="checkbox" id="{$fields.receiving_dock_c.name}" 
name="{$fields.receiving_dock_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='receiving_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEIVING_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.receiving_fees_c.value) <= 0}
{assign var="value" value=$fields.receiving_fees_c.default_value }
{else}
{assign var="value" value=$fields.receiving_fees_c.value }
{/if}  
<input type='text' name='{$fields.receiving_fees_c.name}' 
id='{$fields.receiving_fees_c.name}' size='30' 
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
<td valign="top" id='refund_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFUND_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.refund_fees_c.value) <= 0}
{assign var="value" value=$fields.refund_fees_c.default_value }
{else}
{assign var="value" value=$fields.refund_fees_c.value }
{/if}  
<input type='text' name='{$fields.refund_fees_c.name}' 
id='{$fields.refund_fees_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='other_fees_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.other_fees_c.value) <= 0}
{assign var="value" value=$fields.other_fees_c.default_value }
{else}
{assign var="value" value=$fields.other_fees_c.value }
{/if}  
<input type='text' name='{$fields.other_fees_c.name}' 
id='{$fields.other_fees_c.name}' size='30' 
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
<td valign="top" id='reception_area_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEPTION_AREA' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.reception_area_c.value) == "1" || strval($fields.reception_area_c.value) == "yes" || strval($fields.reception_area_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.reception_area_c.name}" value="0"> 
<input type="checkbox" id="{$fields.reception_area_c.name}" 
name="{$fields.reception_area_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='regn_area_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REGN_AREA' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.regn_area_c.value) == "1" || strval($fields.regn_area_c.value) == "yes" || strval($fields.regn_area_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.regn_area_c.name}" value="0"> 
<input type="checkbox" id="{$fields.regn_area_c.name}" 
name="{$fields.regn_area_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='dining_room_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DINING_ROOM' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.dining_room_c.value) == "1" || strval($fields.dining_room_c.value) == "yes" || strval($fields.dining_room_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.dining_room_c.name}" value="0"> 
<input type="checkbox" id="{$fields.dining_room_c.name}" 
name="{$fields.dining_room_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='exclusive_caterer_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EXCLUSIVE_CATERER' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.exclusive_caterer_c.value) == "1" || strval($fields.exclusive_caterer_c.value) == "yes" || strval($fields.exclusive_caterer_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.exclusive_caterer_c.name}" value="0"> 
<input type="checkbox" id="{$fields.exclusive_caterer_c.name}" 
name="{$fields.exclusive_caterer_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='meeting_rooms_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MEETING_ROOMS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.meeting_rooms_c.value) == "1" || strval($fields.meeting_rooms_c.value) == "yes" || strval($fields.meeting_rooms_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.meeting_rooms_c.name}" value="0"> 
<input type="checkbox" id="{$fields.meeting_rooms_c.name}" 
name="{$fields.meeting_rooms_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='theatre_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_THEATRE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.theatre_c.value) == "1" || strval($fields.theatre_c.value) == "yes" || strval($fields.theatre_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.theatre_c.name}" value="0"> 
<input type="checkbox" id="{$fields.theatre_c.name}" 
name="{$fields.theatre_c.name}" 
value="1" title='' tabindex="0" {$checked} >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='stages_allowed_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STAGES_ALLOWED' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strval($fields.stages_allowed_c.value) == "1" || strval($fields.stages_allowed_c.value) == "yes" || strval($fields.stages_allowed_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.stages_allowed_c.name}" value="0"> 
<input type="checkbox" id="{$fields.stages_allowed_c.name}" 
name="{$fields.stages_allowed_c.name}" 
value="1" title='' tabindex="0" {$checked} >
<td valign="top" id='venue_comments_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.venue_comments_c.value) <= 0}
{assign var="value" value=$fields.venue_comments_c.default_value }
{else}
{assign var="value" value=$fields.venue_comments_c.value }
{/if}  
<input type='text' name='{$fields.venue_comments_c.name}' 
id='{$fields.venue_comments_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_VENUE").style.display='none';</script>
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
{sugar_translate label='LBL_EVENT_CATERER' module='Accounts'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EVENT_CATERER'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='caterer_rating_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CATERER_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.caterer_rating_c.name}" 
id="{$fields.caterer_rating_c.name}" 
title=''       
>
{if isset($fields.caterer_rating_c.value) && $fields.caterer_rating_c.value != ''}
{html_options options=$fields.caterer_rating_c.options selected=$fields.caterer_rating_c.value}
{else}
{html_options options=$fields.caterer_rating_c.options selected=$fields.caterer_rating_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.caterer_rating_c.options }
{capture name="field_val"}{$fields.caterer_rating_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.caterer_rating_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.caterer_rating_c.name}" 
id="{$fields.caterer_rating_c.name}" 
title=''          
>
{if isset($fields.caterer_rating_c.value) && $fields.caterer_rating_c.value != ''}
{html_options options=$fields.caterer_rating_c.options selected=$fields.caterer_rating_c.value}
{else}
{html_options options=$fields.caterer_rating_c.options selected=$fields.caterer_rating_c.default}
{/if}
</select>
<input
id="{$fields.caterer_rating_c.name}-input"
name="{$fields.caterer_rating_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.caterer_rating_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.caterer_rating_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.caterer_rating_c.name}-input', '{$fields.caterer_rating_c.name}');sync_{$fields.caterer_rating_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.caterer_rating_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.caterer_rating_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.caterer_rating_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.caterer_rating_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.caterer_rating_c.name}{literal}");
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
sync_{/literal}{$fields.caterer_rating_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.caterer_rating_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.caterer_rating_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.caterer_rating_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.caterer_rating_c.name}{literal}");
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
<td valign="top" id='cat_contract_status_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CAT_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.cat_contract_status_c.name}" 
id="{$fields.cat_contract_status_c.name}" 
title=''       
>
{if isset($fields.cat_contract_status_c.value) && $fields.cat_contract_status_c.value != ''}
{html_options options=$fields.cat_contract_status_c.options selected=$fields.cat_contract_status_c.value}
{else}
{html_options options=$fields.cat_contract_status_c.options selected=$fields.cat_contract_status_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.cat_contract_status_c.options }
{capture name="field_val"}{$fields.cat_contract_status_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.cat_contract_status_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.cat_contract_status_c.name}" 
id="{$fields.cat_contract_status_c.name}" 
title=''          
>
{if isset($fields.cat_contract_status_c.value) && $fields.cat_contract_status_c.value != ''}
{html_options options=$fields.cat_contract_status_c.options selected=$fields.cat_contract_status_c.value}
{else}
{html_options options=$fields.cat_contract_status_c.options selected=$fields.cat_contract_status_c.default}
{/if}
</select>
<input
id="{$fields.cat_contract_status_c.name}-input"
name="{$fields.cat_contract_status_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.cat_contract_status_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.cat_contract_status_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.cat_contract_status_c.name}-input', '{$fields.cat_contract_status_c.name}');sync_{$fields.cat_contract_status_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.cat_contract_status_c.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.cat_contract_status_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.cat_contract_status_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.cat_contract_status_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.cat_contract_status_c.name}{literal}");
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
sync_{/literal}{$fields.cat_contract_status_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.cat_contract_status_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.cat_contract_status_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.cat_contract_status_c.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.cat_contract_status_c.name}{literal}");
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
<td valign="top" id='food_specialty_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_FOOD_SPECIALTY' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.food_specialty_c.value) <= 0}
{assign var="value" value=$fields.food_specialty_c.default_value }
{else}
{assign var="value" value=$fields.food_specialty_c.value }
{/if}  
<input type='text' name='{$fields.food_specialty_c.name}' 
id='{$fields.food_specialty_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
<td valign="top" id='caterer_restrictions_c_label' width='12.5%' data-total-columns="2" scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CATERER_RESTRICTIONS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' data-total-columns="2" >
{counter name="panelFieldCount"}

{if strlen($fields.caterer_restrictions_c.value) <= 0}
{assign var="value" value=$fields.caterer_restrictions_c.default_value }
{else}
{assign var="value" value=$fields.caterer_restrictions_c.value }
{/if}  
<input type='text' name='{$fields.caterer_restrictions_c.name}' 
id='{$fields.caterer_restrictions_c.name}' size='30' 
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
<script>document.getElementById("LBL_EVENT_CATERER").style.display='none';</script>
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
<div class="action_buttons"><input type="button" value="Save" name="button" onclick="var _form = document.getElementById('EditView'); var _onclick=(function(){ldelim}_form.action.value='Save'; if(  check_form('EditView') && check())return true;else return false;{rdelim}()); if(_onclick!==false) _form.submit();" class="button primary" accesskey="S" title="Save [Alt+S]"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Accounts'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Accounts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
</td>
</tr>
</table>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>{sugar_getscript file="cache/include/javascript/sugar_grp_yui_widgets.js"}
<script type="text/javascript">
var EditView_tabs = new YAHOO.widget.TabView("EditView_tabs");
EditView_tabs.selectTab(0);
</script>
<script type="text/javascript">
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
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'account_type', 'enum', false,'{/literal}{sugar_translate label='LBL_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'industry', 'enum', false,'{/literal}{sugar_translate label='LBL_INDUSTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'annual_revenue', 'varchar', false,'{/literal}{sugar_translate label='LBL_ANNUAL_REVENUE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_fax', 'phone', false,'{/literal}{sugar_translate label='LBL_FAX' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_street', 'varchar', true,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_2' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_3' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_street_4', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_4' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_city', 'varchar', true,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_CITY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_state', 'varchar', true,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STATE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_postalcode', 'varchar', true,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_POSTALCODE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_country', 'varchar', true,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_COUNTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'rating', 'varchar', false,'{/literal}{sugar_translate label='LBL_RATING' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_office', 'phone', true,'{/literal}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_alternate', 'phone', false,'{/literal}{sugar_translate label='LBL_PHONE_ALT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'website', 'url', false,'{/literal}{sugar_translate label='LBL_WEBSITE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'ownership', 'varchar', false,'{/literal}{sugar_translate label='LBL_OWNERSHIP' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'employees', 'varchar', false,'{/literal}{sugar_translate label='LBL_EMPLOYEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'ticker_symbol', 'varchar', false,'{/literal}{sugar_translate label='LBL_TICKER_SYMBOL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_2' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_3' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_street_4', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_4' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_CITY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STATE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_POSTALCODE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_COUNTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'email1', 'varchar', true,'{/literal}{sugar_translate label='LBL_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'email_addresses_non_primary', 'email', false,'{/literal}{sugar_translate label='LBL_EMAIL_NON_PRIMARY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'parent_id', 'id', false,'{/literal}{sugar_translate label='LBL_PARENT_ACCOUNT_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'sic_code', 'varchar', false,'{/literal}{sugar_translate label='LBL_SIC_CODE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'parent_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MEMBER_OF' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'email_opt_out', 'bool', false,'{/literal}{sugar_translate label='LBL_EMAIL_OPT_OUT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'invalid_email', 'bool', false,'{/literal}{sugar_translate label='LBL_INVALID_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'email', 'email', false,'{/literal}{sugar_translate label='LBL_ANY_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'campaign_id', 'id', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'campaign_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'flip_charts_c', 'bool', false,'{/literal}{sugar_translate label='LBL_FLIP_CHARTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'consult_c', 'bool', false,'{/literal}{sugar_translate label='LBL_CONSULT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'reference2_comments_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_REFERENCE2_COMMENTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'corporate_rate_value_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CORPORATE_RATE_VALUE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'consult_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CONSULT_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'travel_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_TRAVEL_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'fac_rent_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FAC_RENT_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'contractor_c', 'bool', false,'{/literal}{sugar_translate label='LBL_CONTRACTOR' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'reference3_comments_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_REFERENCE3_COMMENTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'other_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_OTHER_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'internet_avail_c', 'bool', false,'{/literal}{sugar_translate label='LBL_INTERNET_AVAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'others_c', 'bool', false,'{/literal}{sugar_translate label='LBL_OTHERS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'reqd_deposit_c', 'bool', false,'{/literal}{sugar_translate label='LBL_REQD_DEPOSIT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id4_c', 'id', false,'{/literal}{sugar_translate label='' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'num_guest_rooms_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_NUM_GUEST_ROOMS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'cat_contract_status_c', 'enum', false,'{/literal}{sugar_translate label='LBL_CAT_CONTRACT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'parking_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_PARKING_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'sports_c', 'bool', false,'{/literal}{sugar_translate label='LBL_SPORTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'customer_id_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CUSTOMER_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'caterer_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CATERER_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'av_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_AV_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'fac_rating_c', 'enum', false,'{/literal}{sugar_translate label='LBL_FAC_RATING' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'stages_allowed_c', 'bool', false,'{/literal}{sugar_translate label='LBL_STAGES_ALLOWED' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'regn_area_c', 'bool', false,'{/literal}{sugar_translate label='LBL_REGN_AREA' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'theatre_c', 'bool', false,'{/literal}{sugar_translate label='LBL_THEATRE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'facilitate_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FACILITATE_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'hospital_c', 'bool', false,'{/literal}{sugar_translate label='LBL_HOSPITAL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'builder_c', 'bool', false,'{/literal}{sugar_translate label='LBL_BUILDER' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'meeting_rooms_c', 'bool', false,'{/literal}{sugar_translate label='LBL_MEETING_ROOMS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'deposit_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_DEPOSIT_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'receiving_dock_c', 'bool', false,'{/literal}{sugar_translate label='LBL_RECEIVING_DOCK' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'educational_institution_c', 'bool', false,'{/literal}{sugar_translate label='LBL_EDUCATIONAL_INSTITUTION' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'refund_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_REFUND_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'venue_rating_c', 'enum', false,'{/literal}{sugar_translate label='LBL_VENUE_RATING' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'dining_room_c', 'bool', false,'{/literal}{sugar_translate label='LBL_DINING_ROOM' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'implement_c', 'bool', false,'{/literal}{sugar_translate label='LBL_IMPLEMENT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'food_specialty_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FOOD_SPECIALTY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'venue_comments_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_VENUE_COMMENTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'reception_area_c', 'bool', false,'{/literal}{sugar_translate label='LBL_RECEPTION_AREA' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id3_c', 'id', false,'{/literal}{sugar_translate label='' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'implement_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_IMPLEMENT_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'reference1_comments_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_REFERENCE1_COMMENTS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'ven_contract_status_c', 'enum', false,'{/literal}{sugar_translate label='LBL_VEN_CONTRACT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'fac_contract_status_c', 'enum', false,'{/literal}{sugar_translate label='LBL_FAC_CONTRACT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'parking_avail_c', 'bool', false,'{/literal}{sugar_translate label='LBL_PARKING_AVAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'receiving_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_RECEIVING_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id1_c', 'id', false,'{/literal}{sugar_translate label='' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'corporate_rate_avail_c', 'bool', false,'{/literal}{sugar_translate label='LBL_CORPORATE_RATE_AVAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'caterer_rating_c', 'enum', false,'{/literal}{sugar_translate label='LBL_CATERER_RATING' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id2_c', 'id', false,'{/literal}{sugar_translate label='' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'customer_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_CUSTOMER_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'venue_restrictions_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_VENUE_RESTRICTIONS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'travel_reimb_c', 'bool', false,'{/literal}{sugar_translate label='LBL_TRAVEL_REIMB' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'exclusive_av_c', 'bool', false,'{/literal}{sugar_translate label='LBL_EXCLUSIVE_AV' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'exclusive_caterer_c', 'bool', false,'{/literal}{sugar_translate label='LBL_EXCLUSIVE_CATERER' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'own_facil_c', 'bool', false,'{/literal}{sugar_translate label='LBL_OWN_FACIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'is_existing_customer_c', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_EXISTING_CUSTOMER' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'hotel_c', 'bool', false,'{/literal}{sugar_translate label='LBL_HOTEL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'flip_chart_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FLIP_CHART_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'pharmaceutical_c', 'bool', false,'{/literal}{sugar_translate label='LBL_PHARMACEUTICAL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'retail_c', 'bool', false,'{/literal}{sugar_translate label='LBL_RETAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'venue_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_VENUE_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'will_book_block_c', 'bool', false,'{/literal}{sugar_translate label='LBL_WILL_BOOK_BLOCK' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'internet_fees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_INTERNET_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'caterer_restrictions_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_CATERER_RESTRICTIONS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'av_avail_c', 'bool', false,'{/literal}{sugar_translate label='LBL_AV_AVAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'facilitate_c', 'bool', false,'{/literal}{sugar_translate label='LBL_FACILITATE' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_id_c', 'id', false,'{/literal}{sugar_translate label='LBL_OPPORTUNITY_OPPORTUNITY_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_c', 'relate', false,'{/literal}{sugar_translate label='LBL_OPPORTUNITY' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'jjwg_maps_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_ADDRESS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'jjwg_maps_geocode_status_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_GEOCODE_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'jjwg_maps_lat_c', 'float', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_LAT' module='Accounts' for_js=true}{literal}' );
addToValidate('EditView', 'jjwg_maps_lng_c', 'float', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_LNG' module='Accounts' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='Accounts' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'parent_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_MEMBER_OF' module='Accounts' for_js=true}{literal}', 'parent_id' );
addToValidateBinaryDependency('EditView', 'reference3_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='undefined' module='Accounts' for_js=true}{literal}', 'contact_id3_c' );
addToValidateBinaryDependency('EditView', 'reference2_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='undefined' module='Accounts' for_js=true}{literal}', 'contact_id2_c' );
addToValidateBinaryDependency('EditView', 'av_contact_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='undefined' module='Accounts' for_js=true}{literal}', 'contact_id4_c' );
addToValidateBinaryDependency('EditView', 'reference1_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='undefined' module='Accounts' for_js=true}{literal}', 'contact_id1_c' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_parent_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_parent_name","parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["parent_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['EditView_reference1_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["reference1_c","contact_id1_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_reference2_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["reference2_c","contact_id2_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_reference3_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["reference3_c","contact_id3_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_av_contact_c']={"form":"EditView","method":"query","modules":["Contacts"],"group":"or","field_list":["name","id"],"populate_list":["av_contact_c","contact_id4_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}

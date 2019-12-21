

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>

<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if}  <input title="Print as PDF" accesskey="M" class="button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='quote_Quote';_form.return_action.value='DetailView';_form.return_id.value='{$fields.id.value}'; _form.action.value='printPdf'; _form.module.value='quote_Quote';_form.submit();" name="button" value="Print as PDF" type="button"/> {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=quote_Quote", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="quote_Quote_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='DEFAULT' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBJECT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.quote_quote_opportunities_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_quote_opportunities_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.quote_quote_opportunitiesopportunities_ida.value)}
{capture assign="detail_url"}index.php?module=Opportunities&action=DetailView&record={$fields.quote_quote_opportunitiesopportunities_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="quote_quote_opportunitiesopportunities_ida" class="sugar_field" data-id-value="{$fields.quote_quote_opportunitiesopportunities_ida.value}">{$fields.quote_quote_opportunities_name.value}</span>
{if !empty($fields.quote_quote_opportunitiesopportunities_ida.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.quote_quote_number.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_quote_number.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_quote_number.name}">
{assign var="value" value=$fields.quote_quote_number.value }
{$value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.quotation_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTATION_STATUS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quotation_status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.quotation_status.options)}
<input type="hidden" class="sugar_field" id="{$fields.quotation_status.name}" value="{ $fields.quotation_status.options }">
{ $fields.quotation_status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.quotation_status.name}" value="{ $fields.quotation_status.value }">
{ $fields.quotation_status.options[$fields.quotation_status.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.purchase_order_number_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PURCHASE_ORDER_NUMBER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.purchase_order_number_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.purchase_order_number_c.name}">
{sugar_number_format precision=0 var=$fields.purchase_order_number_c.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.valid_until_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VALID_UNTIL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.valid_until_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.valid_until_c.value) <= 0}
{assign var="value" value=$fields.valid_until_c.default_value }
{else}
{assign var="value" value=$fields.valid_until_c.value }
{/if}
<span class="sugar_field" id="{$fields.valid_until_c.name}">{$value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.payment_terms_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_TERMS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.payment_terms_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.payment_terms_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.payment_terms_c.name}" value="{ $fields.payment_terms_c.options }">
{ $fields.payment_terms_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.payment_terms_c.name}" value="{ $fields.payment_terms_c.value }">
{ $fields.payment_terms_c.options[$fields.payment_terms_c.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.original_p_o_date_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ORIGINAL_P_O_DATE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.original_p_o_date_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.original_p_o_date_c.value) <= 0}
{assign var="value" value=$fields.original_p_o_date_c.default_value }
{else}
{assign var="value" value=$fields.original_p_o_date_c.value }
{/if}
<span class="sugar_field" id="{$fields.original_p_o_date_c.name}">{$value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.team_list_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAM_LIST' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.team_list_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.team_list_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.team_list_c.name}" value="{ $fields.team_list_c.options }">
{ $fields.team_list_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.team_list_c.name}" value="{ $fields.team_list_c.value }">
{ $fields.team_list_c.options[$fields.team_list_c.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL14' module='quote_Quote'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_EDITVIEW_PANEL14' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.quote_quote_accounts_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_quote_accounts_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.quote_quote_accountsaccounts_ida.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.quote_quote_accountsaccounts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="quote_quote_accountsaccounts_ida" class="sugar_field" data-id-value="{$fields.quote_quote_accountsaccounts_ida.value}">{$fields.quote_quote_accounts_name.value}</span>
{if !empty($fields.quote_quote_accountsaccounts_ida.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.accounts_quote_quote_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_QUOTE_QUOTE_1_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.accounts_quote_quote_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.accounts_quote_quote_1accounts_ida.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.accounts_quote_quote_1accounts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="accounts_quote_quote_1accounts_ida" class="sugar_field" data-id-value="{$fields.accounts_quote_quote_1accounts_ida.value}">{$fields.accounts_quote_quote_1_name.value}</span>
{if !empty($fields.accounts_quote_quote_1accounts_ida.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL14").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL12' module='quote_Quote'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table id='LBL_EDITVIEW_PANEL12' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.billing_address_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ADDRESS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.billing_address_c.hidden}
{counter name="panelFieldCount"}
<span id="billing_address_c" class="sugar_field">{$fields.billing_address_c.value}<br/>
{$fields.billing_address_city_c.value}<br/>
{$fields.billing_address_state_c.value}
{$fields.billing_address_postalcode_c.value}<br/> 
{$fields.billing_address_country_c.value}<br/> </span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.shipping_address_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_ADDRESS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.shipping_address_c.hidden}
{counter name="panelFieldCount"}
<span id="shipping_address_c" class="sugar_field">{$fields.shipping_address_c.value}<br/>
{$fields.shipping_address_city_c.value}<br/>
{$fields.shipping_address_state_c.value}
{$fields.shipping_address_postalcode_c.value}<br/> 
{$fields.shipping_address_country_c.value}<br/> </span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL12").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL13' module='quote_Quote'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table id='LBL_EDITVIEW_PANEL13' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.sub_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUB_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.sub_total.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.sub_total.name}">
{sugar_number_format precision=0 var=$fields.sub_total.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.discount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.discount.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.discount.value) <= 0}
{assign var="value" value=$fields.discount.default_value }
{else}
{assign var="value" value=$fields.discount.value }
{/if} 
<span class="sugar_field" id="{$fields.discount.name}">{$fields.discount.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.discounted_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNTED_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.discounted_total.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.discounted_total.name}">
{sugar_number_format precision=0 var=$fields.discounted_total.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.total_tax.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_TAX' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_tax.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.total_tax.value) <= 0}
{assign var="value" value=$fields.total_tax.default_value }
{else}
{assign var="value" value=$fields.total_tax.value }
{/if} 
<span class="sugar_field" id="{$fields.total_tax.name}">{$fields.total_tax.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.grand_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.grand_total.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.grand_total.name}">
{sugar_number_format precision=0 var=$fields.grand_total.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL13").style.display='none';</script>
{/if}
<div id='detailpanel_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL10' module='quote_Quote'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<table id='LBL_EDITVIEW_PANEL10' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.terms_conditions.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TERMS_CONDITIONS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.terms_conditions.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.terms_conditions.name|escape:'html'|url2html|nl2br}">{$fields.terms_conditions.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.decleration_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DECLERATION' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.decleration_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.decleration_c.name|escape:'html'|url2html|nl2br}">{$fields.decleration_c.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.certify_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CERTIFY' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.certify_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.certify_c.name|escape:'html'|url2html|nl2br}">{$fields.certify_c.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.company_vat_details_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_COMPANY_VAT_DETAILS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.company_vat_details_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.company_vat_details_c.name|escape:'html'|url2html|nl2br}">{$fields.company_vat_details_c.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL10").style.display='none';</script>
{/if}
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>
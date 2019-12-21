

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<td class="buttons"  style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<div class="pull-right">
{php}
echo  $theTitle .= "<div class='favorite' record_id='" . $_REQUEST['record'] . "' module='" . $_REQUEST['module'] . "' style='color: #FFD700;margin:2.5px 10px;'><div class='favorite_icon_outline'><i class='fa fa-2x fa-star-o' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div>
<div class='favorite_icon_fill'><i class='fa fa-2x fa-star' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div></div>";
{/php}
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><input title="Edit" accessKey="i" name="Edit" id="edit_button" value="Edit" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Users'; _form.return_action.value='DetailView'; _form.return_id.value='579a7062-5831-3c2b-3381-5dd4c43acb8c'; _form.action.value='EditView';_form.submit();" type="button"/><ul id class="subnav" ><li><input id="duplicate_button" title="Duplicate" accessKey="u" class="button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Users'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView';_form.submit();" type="button" name="Duplicate" value="Duplicate"/></li><li><input id="delete_button" type="button" class="button" onclick="confirmDelete();" value="Delete" //></li><li><input title="Reset User Preferences" class="button" LANGUAGE="javascript" onclick="if(confirm('Are you sure you want reset all of the preferences for this user?')) window.location='index.php?module=Users&action=resetPreferences&reset_preferences=true&record=1';" type="button" name="password" value="Reset User Preferences"/></li><li><input title="Reset Homepage" class="button" LANGUAGE="javascript" onclick="if(confirm('Are you sure you want reset your Homepage?')) window.location='index.php?module=Users&action=DetailView&reset_homepage=true&record=1';" type="button" name="password" value="Reset Homepage"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Users", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
{$ADMIN_EDIT}
{$PAGINATION}
</div>
</div>
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
</div>
</td>
</tr>
</table>
{sugar_include include=$includes}
<div id="Users_detailview_tabs"
class="yui-navset detailview_tabs"
>

<ul class="yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em>{sugar_translate label='LBL_USER_INFORMATION' module='Users'}</em></a></li>


<li {if $IS_GROUP_OR_PORTAL}style="display: none;"{/if}>
<a id="tab1" href="javascript:void(0)"><em>{$MOD.LBL_ADVANCED}</em></a>
</li>
{if $SHOW_ROLES}
<li>
<a id="tab2" href="javascript:void(0)"><em>{$MOD.LBL_USER_ACCESS}</em></a>
</li>
{/if}
</ul>
<div class="yui-content">
<div id='tabcontent0' >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_USER_INFORMATION' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.full_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="name" field="full_name" width='37.5%'  >
{if !$fields.full_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.full_name.value) <= 0}
{assign var="value" value=$fields.full_name.default_value }
{else}
{assign var="value" value=$fields.full_name.value }
{/if} 
<span class="sugar_field" id="{$fields.full_name.name}">{$fields.full_name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_USER_NAME' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="user_name" field="user_name" width='37.5%'  >
{if !$fields.user_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.user_name.value) <= 0}
{assign var="value" value=$fields.user_name.default_value }
{else}
{assign var="value" value=$fields.user_name.value }
{/if} 
<span class="sugar_field" id="{$fields.user_name.name}">{$fields.user_name.value}</span>
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
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="status" width='37.5%'  >
{if !$fields.status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.status.options)}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.options }">
{ $fields.status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.value }">
{ $fields.status.options[$fields.status.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.UserType.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_USER_TYPE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="UserType" width='37.5%'  >
{if !$fields.UserType.hidden}
{counter name="panelFieldCount"}
<span id="UserType" class="sugar_field">{$USER_TYPE_READONLY}</span>
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
{if !$fields.team_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAM' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="" field="" width='37.5%'  >
{if !$fields.team_c.hidden}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BRANCH' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="branch_c" width='37.5%'  >
{if !$fields.branch_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.branch_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.branch_c.name}" value="{ $fields.branch_c.options }">
{ $fields.branch_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.branch_c.name}" value="{ $fields.branch_c.value }">
{ $fields.branch_c.options[$fields.branch_c.value]}
{/if}
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
<script>document.getElementById("LBL_USER_INFORMATION").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_DETAILVIEW_PANEL1' module='Users'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_DETAILVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.download_source_code_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DOWNLOAD_SOURCE_CODE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="download_source_code_c" width='37.5%' colspan='3' >
{if !$fields.download_source_code_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.download_source_code_c.value) <= 0}
{assign var="value" value=$fields.download_source_code_c.default_value }
{else}
{assign var="value" value=$fields.download_source_code_c.value }
{/if} 
<span class="sugar_field" id="{$fields.download_source_code_c.name}">{$fields.download_source_code_c.value}</span>
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
<script>document.getElementById("LBL_DETAILVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EMPLOYEE_INFORMATION' module='Users'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_EMPLOYEE_INFORMATION' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.employee_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMPLOYEE_STATUS' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="employee_status" width='37.5%'  >
{if !$fields.employee_status.hidden}
{counter name="panelFieldCount"}
<span id='employee_status_span'>
{$fields.employee_status.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.show_on_employees.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHOW_ON_EMPLOYEES' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="bool" field="show_on_employees" width='37.5%'  >
{if !$fields.show_on_employees.hidden}
{counter name="panelFieldCount"}

{if strval($fields.show_on_employees.value) == "1" || strval($fields.show_on_employees.value) == "yes" || strval($fields.show_on_employees.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.show_on_employees.name}" id="{$fields.show_on_employees.name}" value="$fields.show_on_employees.value" disabled="true" {$checked}>
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
{if !$fields.title.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TITLE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="title" width='37.5%'  >
{if !$fields.title.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.title.value) <= 0}
{assign var="value" value=$fields.title.default_value }
{else}
{assign var="value" value=$fields.title.value }
{/if} 
<span class="sugar_field" id="{$fields.title.name}">{$fields.title.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_work.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WORK_PHONE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="phone" field="phone_work" width='37.5%'  class="phone">
{if !$fields.phone_work.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_work.value)}
{assign var="phone_value" value=$fields.phone_work.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if !$fields.department.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPARTMENT' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="department" width='37.5%'  >
{if !$fields.department.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.department.value) <= 0}
{assign var="value" value=$fields.department.default_value }
{else}
{assign var="value" value=$fields.department.value }
{/if} 
<span class="sugar_field" id="{$fields.department.name}">{$fields.department.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_mobile.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="phone" field="phone_mobile" width='37.5%'  class="phone">
{if !$fields.phone_mobile.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_mobile.value)}
{assign var="phone_value" value=$fields.phone_mobile.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if !$fields.reports_to_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REPORTS_TO_NAME' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="relate" field="reports_to_name" width='37.5%'  >
{if !$fields.reports_to_name.hidden}
{counter name="panelFieldCount"}

<span id="reports_to_id" class="sugar_field" data-id-value="{$fields.reports_to_id.value}">{$fields.reports_to_name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_other.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_PHONE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="phone" field="phone_other" width='37.5%'  class="phone">
{if !$fields.phone_other.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_other.value)}
{assign var="phone_value" value=$fields.phone_other.value }
{sugar_phone value=$phone_value usa_format="0"}
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
&nbsp;
</td>
<td class="" type="" field="" width='37.5%'  >
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_fax.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX_PHONE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="phone" field="phone_fax" width='37.5%'  class="phone">
{if !$fields.phone_fax.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_fax.value)}
{assign var="phone_value" value=$fields.phone_fax.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if !$fields.phone_home.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HOME_PHONE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="phone" field="phone_home" width='37.5%' colspan='3' class="phone">
{if !$fields.phone_home.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_home.value)}
{assign var="phone_value" value=$fields.phone_home.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if !$fields.messenger_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MESSENGER_TYPE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="enum" field="messenger_type" width='37.5%'  >
{if !$fields.messenger_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.messenger_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.messenger_type.name}" value="{ $fields.messenger_type.options }">
{ $fields.messenger_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.messenger_type.name}" value="{ $fields.messenger_type.value }">
{ $fields.messenger_type.options[$fields.messenger_type.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.messenger_id.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MESSENGER_ID' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="messenger_id" width='37.5%'  >
{if !$fields.messenger_id.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.messenger_id.value) <= 0}
{assign var="value" value=$fields.messenger_id.default_value }
{else}
{assign var="value" value=$fields.messenger_id.value }
{/if} 
<span class="sugar_field" id="{$fields.messenger_id.name}">{$fields.messenger_id.value}</span>
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
{if !$fields.address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ADDRESS_STREET' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="address_street" width='37.5%'  >
{if !$fields.address_street.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.address_street.value) <= 0}
{assign var="value" value=$fields.address_street.default_value }
{else}
{assign var="value" value=$fields.address_street.value }
{/if} 
<span class="sugar_field" id="{$fields.address_street.name}">{$fields.address_street.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.address_city.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ADDRESS_CITY' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="address_city" width='37.5%'  >
{if !$fields.address_city.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.address_city.value) <= 0}
{assign var="value" value=$fields.address_city.default_value }
{else}
{assign var="value" value=$fields.address_city.value }
{/if} 
<span class="sugar_field" id="{$fields.address_city.name}">{$fields.address_city.value}</span>
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
{if !$fields.address_state.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ADDRESS_STATE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="address_state" width='37.5%'  >
{if !$fields.address_state.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.address_state.value) <= 0}
{assign var="value" value=$fields.address_state.default_value }
{else}
{assign var="value" value=$fields.address_state.value }
{/if} 
<span class="sugar_field" id="{$fields.address_state.name}">{$fields.address_state.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.address_postalcode.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ADDRESS_POSTALCODE' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="address_postalcode" width='37.5%'  >
{if !$fields.address_postalcode.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.address_postalcode.value) <= 0}
{assign var="value" value=$fields.address_postalcode.default_value }
{else}
{assign var="value" value=$fields.address_postalcode.value }
{/if} 
<span class="sugar_field" id="{$fields.address_postalcode.name}">{$fields.address_postalcode.value}</span>
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
{if !$fields.address_country.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ADDRESS_COUNTRY' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="varchar" field="address_country" width='37.5%' colspan='3' >
{if !$fields.address_country.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.address_country.value) <= 0}
{assign var="value" value=$fields.address_country.default_value }
{else}
{assign var="value" value=$fields.address_country.value }
{/if} 
<span class="sugar_field" id="{$fields.address_country.name}">{$fields.address_country.value}</span>
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
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="text" field="description" width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.photo.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PHOTO' module='Users'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td class="" type="image" field="photo" width='37.5%'  >
{if !$fields.photo.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.photo.name}">
<img src="index.php?entryPoint=download&id={$fields.id.value}_{$fields.photo.name}{$fields.width.value}&type={$module}" style="max-width: {if !$vardef.width}160{else}200{/if}px;" height="{if !$vardef.height}160{else}50{/if}">
</span>
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
<script>document.getElementById("LBL_EMPLOYEE_INFORMATION").style.display='none';</script>
{/if}
</div>
<div id='tabcontent1'  class='yui-hidden'>
<div id="detailpanel_2" class="detail view  detail508 expanded">
<div id="settings">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot>{$MOD.LBL_USER_SETTINGS}</slot>
</h4>
</th>
</tr>
<tr>
<td scope="row">
<slot>{$MOD.LBL_RECEIVE_NOTIFICATIONS|strip_semicolon}:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled {$RECEIVE_NOTIFICATIONS}></slot>
</td>
<td>
<slot>{$MOD.LBL_RECEIVE_NOTIFICATIONS_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot>{$MOD.LBL_REMINDER|strip_semicolon}:
</td>
<!--
<td valign="top" nowrap><slot>{include file="modules/Meetings/tpls/reminders.tpl"}</slot></td>
-->
<td valign="top" nowrap>
<slot>{include file="modules/Reminders/tpls/remindersDefaults.tpl"}</slot>
</td>
<td>
<slot>{$MOD.LBL_REMINDER_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td valign="top" scope="row">
<slot>{$MOD.LBL_MAILMERGE|strip_semicolon}:</slot>
</td>
<td valign="top" nowrap>
<slot><input tabindex='3' name='mailmerge_on' disabled class="checkbox"
type="checkbox" {$MAILMERGE_ON}></slot>
</td>
<td>
<slot>{$MOD.LBL_MAILMERGE_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td valign="top" scope="row">
<slot>{$MOD.LBL_SETTINGS_URL|strip_semicolon}:</slot>
</td>
<td valign="top" nowrap>
<slot>{$SETTINGS_URL}</slot>
</td>
<td>
<slot>{$MOD.LBL_SETTINGS_URL_DESC}&nbsp;</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot>{$MOD.LBL_EXPORT_DELIMITER|strip_semicolon}:</slot>
</td>
<td>
<slot>{$EXPORT_DELIMITER}</slot>
</td>
<td>
<slot>{$MOD.LBL_EXPORT_DELIMITER_DESC}</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot>{$MOD.LBL_EXPORT_CHARSET|strip_semicolon}:</slot>
</td>
<td>
<slot>{$EXPORT_CHARSET_DISPLAY}</slot>
</td>
<td>
<slot>{$MOD.LBL_EXPORT_CHARSET_DESC}</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot>{$MOD.LBL_USE_REAL_NAMES|strip_semicolon}:</slot>
</td>
<td>
<slot><input tabindex='3' name='use_real_names' disabled class="checkbox"
type="checkbox" {$USE_REAL_NAMES}></slot>
</td>
<td>
<slot>{$MOD.LBL_USE_REAL_NAMES_DESC}</slot>
</td>
</tr>
{if $DISPLAY_EXTERNAL_AUTH}
<tr>
<td scope="row" valign="top">
<slot>{$EXTERNAL_AUTH_CLASS|strip_semicolon}:</slot>
</td>
<td valign="top" nowrap>
<slot><input id="external_auth_only" name="external_auth_only" type="checkbox"
class="checkbox" {$EXTERNAL_AUTH_ONLY_CHECKED}></slot>
</td>
<td>
<slot>{$MOD.LBL_EXTERNAL_AUTH_ONLY} {$EXTERNAL_AUTH_CLASS}</slot>
</td>
</tr>
{/if}
</table>
</div>
<div id='locale'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot>{$MOD.LBL_USER_LOCALE}</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_DATE_FORMAT|strip_semicolon}:</slot>
</td>
<td>
<slot>{$DATEFORMAT}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_DATE_FORMAT_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_TIME_FORMAT|strip_semicolon}:</slot>
</td>
<td>
<slot>{$TIMEFORMAT}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_TIME_FORMAT_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_TIMEZONE|strip_semicolon}:</slot>
</td>
<td nowrap>
<slot>{$TIMEZONE}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_ZONE_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_CURRENCY|strip_semicolon}:</slot>
</td>
<td>
<slot>{$CURRENCY_DISPLAY}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_CURRENCY_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_CURRENCY_SIG_DIGITS|strip_semicolon}:</slot>
</td>
<td>
<slot>{$CURRENCY_SIG_DIGITS}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_CURRENCY_SIG_DIGITS_DESC}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_NUMBER_GROUPING_SEP|strip_semicolon}:</slot>
</td>
<td>
<slot>{$NUM_GRP_SEP}&nbsp;</slot>
</td>
<td>
<slot>{$MOD.LBL_NUMBER_GROUPING_SEP_TEXT}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_DECIMAL_SEP|strip_semicolon}:</slot>
</td>
<td>
<slot>{$DEC_SEP}&nbsp;</slot>
</td>
<td>
<slot></slot>{$MOD.LBL_DECIMAL_SEP_TEXT}&nbsp;</td>
</tr>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_LOCALE_DEFAULT_NAME_FORMAT|strip_semicolon}:</slot>
</td>
<td>
<slot>{$NAME_FORMAT}&nbsp;</slot>
</td>
<td>
<slot></slot>{$MOD.LBL_LOCALE_NAME_FORMAT_DESC}&nbsp;</td>
</tr>
</table>
</div>
<div id='calendar_options'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot>{$MOD.LBL_CALENDAR_OPTIONS}</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_PUBLISH_KEY|strip_semicolon}:</slot>
</td>
<td width="20%">
<slot>{$CALENDAR_PUBLISH_KEY}&nbsp;</slot>
</td>
<td width="65%">
<slot>{$MOD.LBL_CHOOSE_A_KEY}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>
<nobr>{$MOD.LBL_YOUR_PUBLISH_URL|strip_semicolon}:</nobr>
</slot>
</td>
<td colspan=2>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_PUBLISH_URL}{else}{$MOD.LBL_NO_KEY}{/if}</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_SEARCH_URL|strip_semicolon}:</slot>
</td>
<td colspan=2>
<slot>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_SEARCH_URL}{else}{$MOD.LBL_NO_KEY}{/if}</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_ICAL_PUB_URL|strip_semicolon}: {sugar_help text=$MOD.LBL_ICAL_PUB_URL_HELP}</slot>
</td>
<td colspan=2>
<slot>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_ICAL_URL}{else}{$MOD.LBL_NO_KEY}{/if}</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_FDOW|strip_semicolon}:</slot>
</td>
<td>
<slot>{$FDOWDISPLAY}&nbsp;</slot>
</td>
<td>
<slot></slot>{$MOD.LBL_FDOW_TEXT}&nbsp;</td>
</tr>
</table>
</div>
<div id='edit_tabs'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot>{$MOD.LBL_LAYOUT_OPTIONS}</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_USE_GROUP_TABS|strip_semicolon}:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled {$USE_GROUP_TABS}></slot>
</td>
<td>
<slot>{$MOD.LBL_NAVIGATION_PARADIGM_DESCRIPTION}&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>{$MOD.LBL_SUBPANEL_TABS|strip_semicolon}:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled {$SUBPANEL_TABS}></slot>
</td>
<td>
<slot>{$MOD.LBL_SUBPANEL_TABS_DESCRIPTION}&nbsp;</slot>
</td>
</tr>
</table>
</div>
</div>
</div>
<div id='tabcontent2'  class='yui-hidden'>
<div id="detailpanel_3" class="detail view  detail508 expanded">
<div id="advanced">
<TABLE width='100%' class='detail view' border='0' cellpadding=0 cellspacing = 1  ><TR><td style="background: transparent;"></td><td style="text-align: center;" scope="row"><b>Access</b></td><td style="text-align: center;" scope="row"><b>Delete</b></td><td style="text-align: center;" scope="row"><b>Edit</b></td><td style="text-align: center;" scope="row"><b>Export</b></td><td style="text-align: center;" scope="row"><b>Import</b></td><td style="text-align: center;" scope="row"><b>List</b></td><td style="text-align: center;" scope="row"><b>Mass Update</b></td><td style="text-align: center;" scope="row"><b>View</b></td></TR><TR><td nowrap width='1%' scope="row"><b>Activity Count</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Alerts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Architects</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Architectural Firms</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Bugs</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Calls</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Calls Reschedule</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Campaigns</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Case Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Case Updates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Cases</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Contacts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Contracts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Custom Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Customers</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Discount Approval Matrix</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Documents</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>EAPM</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Email Marketing</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Email Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Emails</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Event Participants</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Feed Back Form</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Index</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Index Event</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Invoices</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>KB Categories</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Knowledge Base</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Locations</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Login History</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Login/Logout Audit</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Address Cache</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Areas</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Markers</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Maps</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Meetings</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Notes</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Opportunities</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Outbound Email Accounts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>PDF Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Process Audit</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Product Categories</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Product Categories Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Products</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Products Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Programs</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Holidays</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Task Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Tasks</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Projects</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote Line Items</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote PDF</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quotes Old</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quotes Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Report Builder</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Report Scheduler</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports Asol</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports Log</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Sales Targets</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Schedule History</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Scheduled Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Scheduling Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Security Groups Management</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Showroom Walk in</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Spots</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Target Lists</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Targets</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Tasks</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Tax</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Template Section Line</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Vendor</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Vendors</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Venue Rooms</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>WorkFlow</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR></TABLE>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type='text/javascript' src='{sugar_getjspath file='modules/javascript/popup_helper.js'}'></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript">
var Users_detailview_tabs = new YAHOO.widget.TabView("Users_detailview_tabs");
Users_detailview_tabs.selectTab(0);
</script>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<script type='text/javascript' src='{sugar_getjspath file='modules/Users/DetailView.js'}'></script>
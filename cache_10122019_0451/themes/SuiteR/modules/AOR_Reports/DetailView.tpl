
<style>
{literal}
ul.clickMenu > li
{
background: #2767A8 !important;
border-radius: 0px !important; 
}
ul.clickMenu > li:first-child a
{
color:white !important;
background: #2767A8 !important;
}
ul.history_acitvities_button > li
{
background: #fff !important;
border-radius: 3px !important; 	
}
ul.clickMenu li ul.subnav li a
{
color: #000000 !important;
}
#dialog
{
display:none;
}
i
{
display:none;
}
b
{
font-weight:normal;
}
.show_primary_email span table tbody tr:not(:first-child) {
display:none;
}
ul.round-button li
{
background-color: #fff !important;
}
input[value="Copy..."] { display: none !important; }​
.yui-navset .yui-content, .yui-navset .yui-navset-top .yui-content {
padding: 0px !important;
}
ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a{
color:#000000 !important;
}
{/literal}
</style>
<script >
    {literal}

    $(document).ready(function () {
        $(".dataField").css("display", "none");
        $('#Activities_createtask_button').attr('data-toggle', 'modal');
        $('#Activities_createtask_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_createtask_button').attr('data-toggle', 'modal');
        $('#activities_createtask_button').attr('data-target', '#myModalcustom_popup');


        $('#Activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#Activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');

        $('#Activities_logcall_button').attr('data-toggle', 'modal');
        $('#Activities_logcall_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_logcall_button').attr('data-toggle', 'modal');
        $('#activities_logcall_button').attr('data-target', '#myModalcustom_popup');

        $('#History_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#History_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');
        $('#history_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#history_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');


        /*
         $( ".custom-noBullet" ).click(function() {
         $("#"+this.id+" .change_color_dashlets span[id*='show_link_'] .utilsLink").trigger("click");
         });
         */


        var right = $(".custom-right-panel").height();
        var left = $(".custom-left-panel").height();
        if (left >= right)
        {
            $(".custom-left-panel").css("border-right", "1px solid #d9dada");
        } else
        {
            $(".custom-right-panel").css("border-left", "1px solid #d9dada");
        }

        $(".custom-yui-nav li, .righttab").click(function () {
            var right = $(".custom-right-panel").height();
            var left = $(".custom-left-panel").height();
            if (left >= right)
            {
                $(".custom-left-panel").css("border-right", "1px solid #d9dada");
            } else
            {
                $(".custom-right-panel").css("border-left", "1px solid #d9dada");
            }

        })


        if ($('.custom-right-panel').length == "0")
        {
            $('.custom-left-panel').removeClass('col-sm-7');
            $('.custom-left-panel').addClass('col-sm-12');
        }


    });





    {/literal}
</script>

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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='AOR_Reports'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='AOR_Reports'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='AOR_Reports'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li><input type="button" class="button" id="download_csv_button_old" value="{$MOD.LBL_EXPORT}"/></li><li><input type="button" class="button" id="download_pdf_button_old" value="{$MOD.LBL_DOWNLOAD_PDF}"/></li><li><input type="button" class="button" onClick="openProspectPopup();" value="{$MOD.LBL_ADD_TO_PROSPECT_LIST}"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=AOR_Reports", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
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
</div>
{sugar_include include=$includes}
<div class="row" style="border:1px solid #d9dada; margin-top:5px;background-color:white;" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="AOR_Reports_detailview_tabs"
>
<div  ">
<div id='detailpanel_1' class='detail view  detail508 collapsed'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='DEFAULT' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="assigned_user_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}
<span id="date_modified" class="sugar_field">{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='AOR_Reports'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="description"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
</div>
</div>
</div>
<script src="modules/AOR_Conditions/conditionLines.js"></script>
<script>
report_module = '{$report_module}';
</script>
<div>
{$charts_content}
</div>
<div id='detailpanel_parameters' class='detail view  detail508 expanded hidden'>
<form onsubmit="return false" id="EditView" name="EditView">
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel('parameters');">
<img border="0" id="detailpanel_parameters_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel('parameters');">
<img border="0" id="detailpanel_parameters_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PARAMETERS' module='AOR_Reports'}
<script>
document.getElementById('detailpanel_parameters').className += ' expanded';
</script>
</h4>
<div id="conditionLines" class="panelContainer" style="min-height: 50px;">
</div>
<input id='updateParametersButton' class="panelContainer" type="button" value="{sugar_translate label='LBL_UPDATE_PARAMETERS' module='AOR_Reports'}"/>
<script>
{literal}
$.each(reportParameters, function (key, val) {
loadConditionLine(val, 'EditView');
});
$(document).ready(function () {
$('#updateParametersButton').click(function () {
//Update the Detail view form to have the parameter info and reload the page
var _form = $('#formDetailView');
_form.find('input[name=action]').val('DetailView');
//Add each parameter to the form in turn
$('.aor_conditions_id').each(function (index, elem) {
$elem = $(elem);
var ln = $elem.attr('id').substr(17);
var id = $elem.val();
_form.append('<input type="hidden" name="parameter_id[]" value="' + id + '">');
var operator = $("#aor_conditions_operator\\[" + ln + "\\]").val();
_form.append('<input type="hidden" name="parameter_operator[]" value="' + operator + '">');
var fieldType = $('#aor_conditions_value_type\\[' + ln + '\\]').val();
_form.append('<input type="hidden" name="parameter_type[]" value="' + fieldType + '">');
var fieldInput = $('#aor_conditions_value\\[' + ln + '\\]').val();
// Fix for issue #1272 - AOR_Report module cannot update Date type parameter.
if ($('#aor_conditions_value\\[' + ln + '\\]\\[0\\]').length) {
var fieldValue = $('#aor_conditions_value\\[' + ln + '\\]\\[0\\]').val();
var fieldSign = $('#aor_conditions_value\\[' + ln + '\\]\\[1\\]').val();
var fieldNumber = $('#aor_conditions_value\\[' + ln + '\\]\\[2\\]').val();
var fieldTime = $('#aor_conditions_value\\[' + ln + '\\]\\[3\\]').val();
_form.append('<input type="hidden" name="parameter_value[]" value="' + fieldValue + '">');
_form.append('<input type="hidden" name="parameter_value[]" value="' + fieldSign + '">');
_form.append('<input type="hidden" name="parameter_value[]" value="' + fieldNumber + '">');
_form.append('<input type="hidden" name="parameter_value[]" value="' + fieldTime + '">');
}
// Fix for issue #1082 - change local date format to db date format
if ($('#aor_conditions_value\\[' + index + '\\]').hasClass('date_input')) { // only change to DB format if its a date
if ($('#aor_conditions_value\\[' + ln + '\\]').hasClass('date_input')) {
/*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
var fieldInput1 = MyformatDate(fieldInput,cal_date_format); 
/*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
fieldInput = $.datepicker.formatDate('yy-mm-dd', new Date(fieldInput1));
// alert(ln + "----" + id + "------" + fieldInput)
}
}
_form.append('<input type="hidden" name="parameter_value[]" value="' + fieldInput + '">');
});
_form.submit();
});
// Make sure to change dates back to the user format
$('.aor_conditions_id').each(function (index, elem) {
if ($('#aor_conditions_value\\[' + index + '\\]').hasClass('date_input')) {
var dateValue = new Date($('#aor_conditions_value\\[' + index + '\\]').val());
var dateValueinUserFormat = dateValue.toLocaleFormat(cal_date_format);
$('#aor_conditions_value\\[' + index + '\\]').val(dateValueinUserFormat)
}
});
});
/*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
function MyformatDate(d1,z) {                    
var yy,mm,dd,zz;
switch (z){ // z - user defined date format
case '%Y-%m-%d': // 2010-12-23
zz = d1.split('-');
yy = zz[0];
mm = zz[1];
dd = zz[2];
break;
case '%m-%d-%Y': // 12-23-2018
zz = d1.split('-');
yy = zz[2];
mm = zz[0];
dd = zz[1];
break;
case '%d-%m-%Y': // 23-12-2010
zz = d1.split('-');
yy = zz[2];
mm = zz[1];
dd = zz[0];
break;
case '%Y/%m/%d': // 2010/12/23
zz = d1.split('/');
yy = zz[0];
mm = zz[1];
dd = zz[2];
break;
case '%m/%d/%Y': // 12/23/2010
zz = d1.split('/');
yy = zz[2];
mm = zz[0];
dd = zz[1];
break;
case '%d/%m/%Y': // 23/12/2010
zz = d1.split('/');
yy = zz[2];
mm = zz[1];
dd = zz[0];
break;
case '%Y.%m.%d': // 2010.12.23
zz = d1.split('.');
yy = zz[0];
mm = zz[1];
dd = zz[2];
break;                        
case '%d.%m.%Y': // 23.12.2010
zz = d1.split('.');
yy = zz[2];
mm = zz[1];
dd = zz[0];
break;
case '%m.%d.%Y': // 12.23.2010
zz = d1.split('.');
yy = zz[2];
mm = zz[0];
dd = zz[1];
break;    
}
return mm+"/"+dd+"/"+yy;
}
/*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
{/literal}
</script>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function () {ldelim}
    initPanel('parameters', 'expanded');
        {rdelim});</script>
</form>
</div>
<div id='detailpanel_report' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel('report');">
<img border="0" id="detailpanel_report_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel('report');">
<img border="0" id="detailpanel_report_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_REPORT' module='AOR_Reports'}
<script>
document.getElementById('detailpanel_report').className += ' expanded';
</script>
</h4>
<table id='FIELDS' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='37.5%' colspan='4' >
{if !$fields.field_lines.hidden}
{counter name="panelFieldCount"}
<span id='field_lines_span'>
{$fields.field_lines.value}
{$report_content}
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function () {ldelim}
    initPanel('report', 'expanded');
        {rdelim});</script>
</div>
<script src="modules/AOR_Reports/Dashlets/AORReportsDashlet/AORReportsDashlet.js"></script>                                                                                                                                                                                                    <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<!--
<button type="button" id="history_activities_modal_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalcustom_popup">Open Large Modal</button>
-->
<div class="modal fade custom_dialog" id="myModalcustom_popup" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_activities"></div>
<!--                     <input title="Cancel" class="subpanel_cancel_button_custom" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr(\'id\'));return false;" type="submit" name="' . $params['module'] . '_subpanel_cancel_button" id="' . $params['module'] . '_subpanel_cancel_button" value="Cancel" data-dismiss="modal">
-->
</div>
</div>
</div>
</div>
<div class="modal fade custom_dialog" id="myModalcustom_popup_history" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_history"></div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="sla_popup" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content cutomer-360-bg" style="background-image:url('themes/SuiteR/images/texture_5.png');background-repeat: repeat;">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" style="margin-top:-11px!important;">&times;</button>
<!--<h4 class="modal-title"><div class="div_h1" >Ticket : <span id="ticket_popup_title"></span></div></h4>-->
</div>
<div class="modal-body">
<form id="msform">
<ul id="progressbar">
<li class="active"><span>Created </span><br><span class="small_font" id="ticket_date_entered"></span></li>
</ul>
</form>
</div>
</div>
</div>
</div>
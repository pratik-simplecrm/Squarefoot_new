
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
<script>
{literal}
$(document).ready(function () {
// Get the modal
/*var modal = document.getElementById('myModal_sla_pop');*/
// Get the button that opens the modal
/*var btn = document.getElementById("myBtn");*/
// Get the <span> element that closes the modal
/*var span = document.getElementsByClassName("close_sla_pop")[0];
*/
// When the user clicks the button, open the modal
/*btn.onclick = function() {
modal.style.display = "block";
}*/
// When the user clicks on <span> (x), close the modal
/*span.onclick = function() {
modal.style.display = "none";
}
*/
// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}*/
//var title=$("#name").html();
var date_entered = $("#date_entered").html();
//$("#ticket_popup_title").html(title);
$("#ticket_date_entered").html(date_entered);
var max_complete = [];
for (i = 1; i < 10; i++) {
if ($("#current_level" + i + "_c").prop("checked") == false) {
//	alert("Checkbox is unchecked. "+i);
$("#remove_color_current_level" + i + "_c").removeClass("active");
}
if ($("#current_level_c").prop("checked") == false) {
//alert("Checkbox is unchecked. "+i);
$("#remove_color_current_level_c").removeClass("active");
}
}
})
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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='quote_Quote'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li><input title="Print as PDF" accesskey="M" class="button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='quote_Quote';_form.return_action.value='DetailView';_form.return_id.value='{$fields.id.value}'; _form.action.value='printPdf'; _form.module.value='quote_Quote';_form.submit();" name="button" value="Print as PDF" type="button" id="print_pdf"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=quote_Quote", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
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
<div id="quote_Quote_detailview_tabs"
>
<div  style="min-height:350px">
<div id='detailpanel_1' class='detail view  detail508 expanded'>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBJECT' module='quote_Quote'}{/capture}
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
{if !$fields.quote_quote_opportunities_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="quote_quote_opportunities_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.quote_quote_opportunities_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.quote_quote_opportunitiesopportunities_ida.value)}
{capture assign="detail_url"}index.php?module=Opportunities&action=DetailView&record={$fields.quote_quote_opportunitiesopportunities_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="quote_quote_opportunitiesopportunities_ida" class="sugar_field" data-id-value="{$fields.quote_quote_opportunitiesopportunities_ida.value}">{$fields.quote_quote_opportunities_name.value}</span>
{if !empty($fields.quote_quote_opportunitiesopportunities_ida.value)}</a>{/if}
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
{if !$fields.custom_quote_num_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOM_QUOTE_NUM_C' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="custom_quote_num_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.custom_quote_num_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.custom_quote_num_c.value) <= 0}
{assign var="value" value=$fields.custom_quote_num_c.default_value }
{else}
{assign var="value" value=$fields.custom_quote_num_c.value }
{/if} 
<span class="sugar_field" id="{$fields.custom_quote_num_c.name}">{$fields.custom_quote_num_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.quotation_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTATION_STATUS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="quotation_status"    style="font-size:14px;word-wrap: break-word;">
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
{if !$fields.purchase_order_number_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PURCHASE_ORDER_NUMBER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="purchase_order_number_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.purchase_order_number_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.purchase_order_number_c.value) <= 0}
{assign var="value" value=$fields.purchase_order_number_c.default_value }
{else}
{assign var="value" value=$fields.purchase_order_number_c.value }
{/if} 
<span class="sugar_field" id="{$fields.purchase_order_number_c.name}">{$fields.purchase_order_number_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.valid_until_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VALID_UNTIL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="date" field="valid_until_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.valid_until_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.valid_until_c.value) <= 0}
{assign var="value" value=$fields.valid_until_c.default_value }
{else}
{assign var="value" value=$fields.valid_until_c.value }
{/if}
<span class="sugar_field" id="{$fields.valid_until_c.name}">{$value}</span>
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
{if !$fields.payment_terms_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_TERMS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="payment_terms_c"    style="font-size:14px;word-wrap: break-word;">
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
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.original_p_o_date_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ORIGINAL_P_O_DATE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="date" field="original_p_o_date_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.original_p_o_date_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.original_p_o_date_c.value) <= 0}
{assign var="value" value=$fields.original_p_o_date_c.default_value }
{else}
{assign var="value" value=$fields.original_p_o_date_c.value }
{/if}
<span class="sugar_field" id="{$fields.original_p_o_date_c.name}">{$value}</span>
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
{if !$fields.branch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BRANCH' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="branch_c"    style="font-size:14px;word-wrap: break-word;">
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
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.customer_type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOMER_TYPE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="customer_type_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.customer_type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.customer_type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.customer_type_c.name}" value="{ $fields.customer_type_c.options }">
{ $fields.customer_type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.customer_type_c.name}" value="{ $fields.customer_type_c.value }">
{ $fields.customer_type_c.options[$fields.customer_type_c.value]}
{/if}
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
{if !$fields.currency_id.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency_id" field="currency_id"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.currency_id.hidden}
{counter name="panelFieldCount"}
<span id='currency_id_span'>
{$fields.currency_id.value}
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.dutyfree_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DUTYFREE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="dutyfree_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.dutyfree_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.dutyfree_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.dutyfree_c.name}" value="{ $fields.dutyfree_c.options }">
{ $fields.dutyfree_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.dutyfree_c.name}" value="{ $fields.dutyfree_c.value }">
{ $fields.dutyfree_c.options[$fields.dutyfree_c.value]}
{/if}
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
{if !$fields.created_by_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CREATED' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="created_by_name"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.created_by_name.hidden}
{counter name="panelFieldCount"}

<span id="created_by" class="sugar_field" data-id-value="{$fields.created_by.value}">{$fields.created_by_name.value}</span>
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
{if !$fields.pdf_type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PDF_TYPE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="pdf_type_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.pdf_type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.pdf_type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.pdf_type_c.name}" value="{ $fields.pdf_type_c.options }">
{ $fields.pdf_type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.pdf_type_c.name}" value="{ $fields.pdf_type_c.value }">
{ $fields.pdf_type_c.options[$fields.pdf_type_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='quote_Quote'}{/capture}
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
{if !$fields.approval_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_STATUS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="approval_status_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.approval_status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.approval_status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.approval_status_c.name}" value="{ $fields.approval_status_c.options }">
{ $fields.approval_status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.approval_status_c.name}" value="{ $fields.approval_status_c.value }">
{ $fields.approval_status_c.options[$fields.approval_status_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.approval_issue_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_ISSUE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="approval_issue_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.approval_issue_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.approval_issue_c.name|escape:'html'|url2html|nl2br}">{$fields.approval_issue_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.unregistered_user_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UNREGISTERED_USER' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="unregistered_user_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.unregistered_user_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.unregistered_user_c.value) == "1" || strval($fields.unregistered_user_c.value) == "yes" || strval($fields.unregistered_user_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.unregistered_user_c.name}" id="{$fields.unregistered_user_c.name}" value="$fields.unregistered_user_c.value" disabled="true" {$checked}>
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
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
{*<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
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
<div id='LBL_EDITVIEW_PANEL14' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.quote_quote_accounts_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="quote_quote_accounts_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.quote_quote_accounts_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.quote_quote_accountsaccounts_ida.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.quote_quote_accountsaccounts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="quote_quote_accountsaccounts_ida" class="sugar_field" data-id-value="{$fields.quote_quote_accountsaccounts_ida.value}">{$fields.quote_quote_accounts_name.value}</span>
{if !empty($fields.quote_quote_accountsaccounts_ida.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.accounts_quote_quote_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_QUOTE_QUOTE_1_FROM_ACCOUNTS_TITLE' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="accounts_quote_quote_1_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.accounts_quote_quote_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.accounts_quote_quote_1accounts_ida.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.accounts_quote_quote_1accounts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="accounts_quote_quote_1accounts_ida" class="sugar_field" data-id-value="{$fields.accounts_quote_quote_1accounts_ida.value}">{$fields.accounts_quote_quote_1_name.value}</span>
{if !empty($fields.accounts_quote_quote_1accounts_ida.value)}</a>{/if}
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
{if !$fields.contact_name_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_NAME' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="contact_name_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.contact_name_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id_c" class="sugar_field" data-id-value="{$fields.contact_id_c.value}">{$fields.contact_name_c.value}</span>
{if !empty($fields.contact_id_c.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.contact_name_shipping_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_NAME_SHIPPING' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="contact_name_shipping_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.contact_name_shipping_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id1_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id1_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id1_c" class="sugar_field" data-id-value="{$fields.contact_id1_c.value}">{$fields.contact_name_shipping_c.value}</span>
{if !empty($fields.contact_id1_c.value)}</a>{/if}
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL14").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
{*<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
{*<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_DETAILVIEW_PANEL17' module='quote_Quote'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<div id='LBL_DETAILVIEW_PANEL17' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.packing_charges_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PACKING_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="packing_charges_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.packing_charges_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.packing_charges_c.name}">
{sugar_number_format var=$fields.packing_charges_c.value precision=2 }
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.freight_charges_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FREIGHT_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="freight_charges_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.freight_charges_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.freight_charges_c.name}">
{sugar_number_format var=$fields.freight_charges_c.value precision=2 }
</span>
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
{if !$fields.loading_unloading_charges_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOADING_UNLOADING_CHARGES_C' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="loading_unloading_charges_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.loading_unloading_charges_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.loading_unloading_charges_c.name}">
{sugar_number_format var=$fields.loading_unloading_charges_c.value precision=2 }
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.other_charges_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_CHARGES' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="other_charges_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.other_charges_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.other_charges_c.name}">
{sugar_number_format var=$fields.other_charges_c.value precision=2 }
</span>
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
{if !$fields.structure_details_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STRUCTURE_DETAILS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="structure_details_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.structure_details_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.structure_details_c.name}">
{sugar_number_format var=$fields.structure_details_c.value precision=2 }
</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_DETAILVIEW_PANEL17").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
{*<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
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
<div id='LBL_EDITVIEW_PANEL12' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.billing_address_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ADDRESS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="billing_address_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.billing_address_c.hidden}
{counter name="panelFieldCount"}
<span id="billing_address_c" class="sugar_field">{$fields.billing_address_c.value}<br/>
{$fields.billing_address_city_c.value}<br/>
{$fields.billing_address_state_c.value}
{$fields.billing_address_postalcode_c.value}<br/> 
{$fields.billing_address_country_c.value}<br/> </span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.shipping_address_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_ADDRESS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="shipping_address_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.shipping_address_c.hidden}
{counter name="panelFieldCount"}
<span id="shipping_address_c" class="sugar_field">{$fields.shipping_address_c.value}<br/>
{$fields.shipping_address_city_c.value}<br/>
{$fields.shipping_address_state_c.value}
{$fields.shipping_address_postalcode_c.value}<br/> 
{$fields.shipping_address_country_c.value}<br/> </span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL12").style.display='none';</script>
{/if}
<div id='detailpanel_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
{*<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
{*<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_DETAILVIEW_PANEL15' module='quote_Quote'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<div id='LBL_DETAILVIEW_PANEL15' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.quote_line_item_layout_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_LINE_ITEM_LAYOUT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="quote_line_item_layout_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.quote_line_item_layout_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.quote_line_item_layout_c.value) <= 0}
{assign var="value" value=$fields.quote_line_item_layout_c.default_value }
{else}
{assign var="value" value=$fields.quote_line_item_layout_c.value }
{/if} 
<span class="sugar_field" id="{$fields.quote_line_item_layout_c.name}">{$fields.quote_line_item_layout_c.value}</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_DETAILVIEW_PANEL15").style.display='none';</script>
{/if}
<div id='detailpanel_6' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(6);">
{*<img border="0" id="detailpanel_6_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
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
<div id='LBL_EDITVIEW_PANEL13' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.sub_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUB_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency" field="sub_total"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.sub_total.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.sub_total.name}'>
{sugar_number_format var=$fields.sub_total.value }
</span>
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
{if !$fields.discount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="discount"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.discount.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.discount.value) <= 0}
{assign var="value" value=$fields.discount.default_value }
{else}
{assign var="value" value=$fields.discount.value }
{/if} 
<span class="sugar_field" id="{$fields.discount.name}">{$fields.discount.value}</span>
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
{if !$fields.discounted_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNTED_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency" field="discounted_total"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.discounted_total.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.discounted_total.name}'>
{sugar_number_format var=$fields.discounted_total.value }
</span>
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
{if !$fields.shipping_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="decimal" field="shipping_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.shipping_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.shipping_c.name}">
{sugar_number_format var=$fields.shipping_c.value precision=2 }
</span>
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
{if !$fields.total_tax.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_TAX' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="total_tax"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.total_tax.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.total_tax.value) <= 0}
{assign var="value" value=$fields.total_tax.default_value }
{else}
{assign var="value" value=$fields.total_tax.value }
{/if} 
<span class="sugar_field" id="{$fields.total_tax.name}">{$fields.total_tax.value}</span>
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
{if !$fields.cess_amount_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CESS_AMOUNT' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency" field="cess_amount_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.cess_amount_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.cess_amount_c.name}'>
{sugar_number_format var=$fields.cess_amount_c.value }
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
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
{if !$fields.grand_total.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency" field="grand_total"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.grand_total.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.grand_total.name}'>
{sugar_number_format var=$fields.grand_total.value }
</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(6, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL13").style.display='none';</script>
{/if}
<div id='detailpanel_7' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(7);">
{*<img border="0" id="detailpanel_7_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
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
<div id='LBL_EDITVIEW_PANEL10' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.terms_conditions.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TERMS_CONDITIONS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="terms_conditions"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.terms_conditions.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.terms_conditions.name|escape:'html'|url2html|nl2br}">{$fields.terms_conditions.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.decleration_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DECLERATION' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="decleration_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.decleration_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.decleration_c.name|escape:'html'|url2html|nl2br}">{$fields.decleration_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.certify_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CERTIFY' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="certify_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.certify_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.certify_c.name|escape:'html'|url2html|nl2br}">{$fields.certify_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.company_vat_details_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_COMPANY_VAT_DETAILS' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="company_vat_details_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.company_vat_details_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.company_vat_details_c.name|escape:'html'|url2html|nl2br}">{$fields.company_vat_details_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(7, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL10").style.display='none';</script>
{/if}
<div id='detailpanel_8' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(8);">
{*<img border="0" id="detailpanel_8_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(8);">
{*<img border="0" id="detailpanel_8_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_DETAILVIEW_PANEL16' module='quote_Quote'}
<script>
document.getElementById('detailpanel_8').className += ' expanded';
</script>
</h4>
<div id='LBL_DETAILVIEW_PANEL16' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}


{assign var="value" value=09-10-2019 }
<span class="sugar_field" id="{$fields.date_entered.name}">{$value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='quote_Quote'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}


{assign var="value" value=29-11-2019 }
<span class="sugar_field" id="{$fields.date_modified.name}">{$value}</span>
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
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(8, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_DETAILVIEW_PANEL16").style.display='none';</script>
{/if}
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>                                                                                                                                                                                                    <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
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
<li class="active" id="remove_color_current_level_c"><span>{sugar_translate label='LBL_DETAILVIEW_PANEL17' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level2_c"><span>{sugar_translate label='LBL_EDITVIEW_PANEL12' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level3_c"><span>{sugar_translate label='LBL_DETAILVIEW_PANEL15' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level4_c"><span>{sugar_translate label='LBL_EDITVIEW_PANEL13' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level5_c"><span>{sugar_translate label='LBL_EDITVIEW_PANEL10' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level6_c"><span>{sugar_translate label='LBL_DETAILVIEW_PANEL16' module='quote_Quote'} </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>
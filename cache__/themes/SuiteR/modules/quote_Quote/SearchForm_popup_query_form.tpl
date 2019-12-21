
<script>
    {literal}
    $(function () {
        var $dialog = $('<div></div>')
                .html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
                .dialog({
                    autoOpen: false,
                    title: SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TITLE'),
                    width: 700
                });

        $('.help-search').click(function () {
            $dialog.dialog('open');
            // prevent the default action, e.g., following a link
        });

    });
    {/literal}
</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
                          
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='custom_quote_num_c_advanced'>{sugar_translate label='LBL_CUSTOM_QUOTE_NUM_C' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{if strlen($fields.custom_quote_num_c_advanced.value) <= 0}
{assign var="value" value=$fields.custom_quote_num_c_advanced.default_value }
{else}
{assign var="value" value=$fields.custom_quote_num_c_advanced.value }
{/if}  
<input type='text' name='{$fields.custom_quote_num_c_advanced.name}' 
    id='{$fields.custom_quote_num_c_advanced.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      accesskey='9'  >
                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='name_advanced'>{sugar_translate label='LBL_SUBJECT' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{if strlen($fields.name_advanced.value) <= 0}
{assign var="value" value=$fields.name_advanced.default_value }
{else}
{assign var="value" value=$fields.name_advanced.value }
{/if}  
<input type='text' name='{$fields.name_advanced.name}' 
    id='{$fields.name_advanced.name}' size='30' 
    maxlength='200' 
    value='{$value}' title=''      >
                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='date_entered_advanced'>{sugar_translate label='LBL_DATE_ENTERED' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<span class="dateTime">
{assign var=date_value value=$fields.date_entered_advanced.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_entered_advanced.name}" id="{$fields.date_entered_advanced.name}" value="{$date_value}" title=''  tabindex=''    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.date_entered_advanced.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.date_entered_advanced.name}",
form : "popup_query_form",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.date_entered_advanced.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>

                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='date_modified_advanced'>{sugar_translate label='LBL_DATE_MODIFIED' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<span class="dateTime">
{assign var=date_value value=$fields.date_modified_advanced.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_modified_advanced.name}" id="{$fields.date_modified_advanced.name}" value="{$date_value}" title=''  tabindex=''    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.date_modified_advanced.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.date_modified_advanced.name}",
form : "popup_query_form",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.date_modified_advanced.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>

                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='resolution_advanced'>{sugar_translate label='LBL_RESOLUTION' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{html_options id='resolution_advanced' name='resolution_advanced[]' options=$fields.resolution_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.resolution_advanced.value}
                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='status_advanced'>{sugar_translate label='LBL_STATUS' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{html_options id='status_advanced' name='status_advanced[]' options=$fields.status_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.status_advanced.value}
                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='priority_advanced'>{sugar_translate label='LBL_PRIORITY' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{html_options id='priority_advanced' name='priority_advanced[]' options=$fields.priority_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.priority_advanced.value}
                    </td>
                
          

        {counter assign=index}
        {math equation="left % right"
        left=$index
        right=$templateMeta.maxColumns
        assign=modVal
        }
        {if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0"
                     src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
    </tr>
    <tr>
        {/if}

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='assigned_user_id_advanced'>{sugar_translate label='LBL_ASSIGNED_TO' module='quote_Quote'}</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
{html_options id='assigned_user_id_advanced' name='assigned_user_id_advanced[]' options=$fields.assigned_user_id_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.assigned_user_id_advanced.value}
                    </td>
            </tr>
    <tr>
        <td colspan='20'>
            &nbsp;
        </td>
    </tr>
    {if $DISPLAY_SAVED_SEARCH}
        <tr>
            <td colspan='2'>
                <a class='tabFormAdvLink' onhover href='javascript:toggleInlineSearch()'>
                    {capture assign="alt_show_hide"}{sugar_translate label='LBL_ALT_SHOW_OPTIONS'}{/capture}
                    {sugar_getimage alt=$alt_show_hide name="advanced_search" ext=".gif" other_attributes='border="0" id="up_down_img" '}
                    &nbsp;{$APP.LNK_SAVED_VIEWS}
                </a><br>
                <input type='hidden' id='showSSDIV' name='showSSDIV' value='{$SHOWSSDIV}'>
                <p>
            </td>
            <td scope='row' width='10%' nowrap="nowrap">
		{*{sugar_translate label='LBL_SAVE_SEARCH_AS' module='SavedSearch'}:*}
            </td>
            <td width='30%' nowrap>
		{*<input type='text' name='saved_search_name'>
                <input type='hidden' name='search_module' value=''>
                <input type='hidden' name='saved_search_action' value=''>
		<button title='{$APP.LBL_SAVE_BUTTON_LABEL}' value='{$APP.LBL_SAVE_BUTTON_LABEL}' class='button btn btn-outline-primary' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'><i class="fa fa-floppy-o  btn-color-new" aria-hidden="true" ></i></button>
		*}
		{*<input title='{$APP.LBL_SAVE_BUTTON_LABEL}' value='{$APP.LBL_SAVE_BUTTON_LABEL}' class='button' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'>*}
            </td>
            <td scope='row' width='10%' nowrap="nowrap">
	    {*{sugar_translate label='LBL_MODIFY_CURRENT_SEARCH' module='SavedSearch'}:*}
            </td>
            <td width='30%' nowrap>
        {*<button class='button btn btn-outline-primary' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='{$APP.LBL_UPDATE}' title='{$APP.LBL_UPDATE}' name='ss_update' id='ss_update' type='button' ><i class="fa fa-refresh " aria-hidden="true" style="color:#2382D5"></i></button>
		<button class='button btn btn-outline-primary' onclick='return SUGAR.savedViews.saved_search_action("delete", "{sugar_translate label='LBL_DELETE_CONFIRM' module='SavedSearch'}")' value='{$APP.LBL_DELETE}' title='{$APP.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'><i class="fa fa-trash  btn-color-new" aria-hidden="true" style="color:#2382D5"></i>
</button>*}
		
		
		{*<input class='button' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='{$APP.LBL_UPDATE}' title='{$APP.LBL_UPDATE}' name='ss_update' id='ss_update' type='button' >
		<input class='button' onclick='return SUGAR.savedViews.saved_search_action("delete", "{sugar_translate label='LBL_DELETE_CONFIRM' module='SavedSearch'}")' value='{$APP.LBL_DELETE}' title='{$APP.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'>
		*}
		
                <br><span id='curr_search_name'></span>
            </td>
        </tr>
        <tr>
            <td colspan='6'>
                <div style='{$DISPLAYSS}' id='inlineSavedSearch'>
                    {$SAVED_SEARCH}
                </div>
            </td>
        </tr>
    {/if}
    {if $displayType != 'popupView'}
        <tr>
            <td colspan='5'>
        <button tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' onclick='SUGAR.savedViews.setChooser()' class='button btn btn-outline-primary' type='submit' name='button' {*value='{$APP.LBL_SEARCH_BUTTON_LABEL}'*} id='search_form_submit_advanced'><i class="fa fa-search  btn-color-new" aria-hidden="true" ></i></button>&nbsp;
        <button tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button btn btn-outline-primary' type='button' name='clear' id='search_form_clear
        _advanced' {*value='{$APP.LBL_CLEAR_BUTTON_LABEL}'*}><i class="fa fa-times  btn-color-new" aria-hidden="true" ></i></button>
        
        {*
        <input tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='{$APP.LBL_SEARCH_BUTTON_LABEL}' id='search_form_submit_advanced'/>&nbsp;
        <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button' type='button' name='clear' id='search_form_clear_advanced' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
        *}
        
                {if $DOCUMENTS_MODULE}
        &nbsp;<input title="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_TITLE}" type="button" class="button" value="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_LABEL}" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
                {/if}
        <button id="basic_search_link" type="button" class='button btn btn-outline-primary' onclick="SUGAR.searchForm.searchFormSelect('{$module}|basic_search','{$module}|advanced_search')"  accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" title="{$APP.LNK_BASIC_SEARCH}"><i class="fa fa-filter  btn-color-new" aria-hidden="true" ></i>
</button>

		{*<a id="basic_search_link" onclick="SUGAR.searchForm.searchFormSelect('{$module}|basic_search','{$module}|advanced_search')" href="javascript:void(0)" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" >{$APP.LNK_BASIC_SEARCH}</a>
		*}

        <span class='white-space'>
            &nbsp;&nbsp;&nbsp;{if $SAVED_SEARCHES_OPTIONS}|&nbsp;&nbsp;&nbsp;<b>{$APP.LBL_SAVED_FILTER_SHORTCUT}</b>&nbsp;
            {$SAVED_SEARCHES_OPTIONS} {/if}
            <span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' {$APP.LBL_GO_BUTTON_LABEL} '/></span>	
        </span>
        
        
       	{sugar_translate label='LBL_SAVE_SEARCH_AS' module='SavedSearch'}:
		<input type='text' name='saved_search_name'>
		<input type='hidden' name='search_module' value=''>
		<input type='hidden' name='saved_search_action' value=''>
		<button title='{$APP.LBL_SAVE_BUTTON_LABEL}' {*value='{$APP.LBL_SAVE_BUTTON_LABEL}'*} class='button btn btn-outline-primary' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'><i class="fa fa-floppy-o  btn-color-new" aria-hidden="true" ></i></button>
		
		{*<input title='{$APP.LBL_SAVE_BUTTON_LABEL}' value='{$APP.LBL_SAVE_BUTTON_LABEL}' class='button' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'>*}
	    
	    {*{sugar_translate label='LBL_MODIFY_CURRENT_SEARCH' module='SavedSearch'}:*}
            <label>Modify current search: </label>

        <button class='button btn btn-outline-primary' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' {*value='{$APP.LBL_UPDATE}'*} title='{$APP.LBL_UPDATE}' name='ss_update' id='ss_update' type='button' ><i class="fa fa-refresh  btn-color-new" aria-hidden="true" ></i></button>
		<button class='button btn btn-outline-primary' onclick='return SUGAR.savedViews.saved_search_action("delete", "{sugar_translate label='LBL_DELETE_CONFIRM' module='SavedSearch'}")' {*value='{$APP.LBL_DELETE}'*} title='{$APP.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'><i class="fa fa-trash  btn-color-new" aria-hidden="true" ></i>
</button>
		
		
		{*<input class='button' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='{$APP.LBL_UPDATE}' title='{$APP.LBL_UPDATE}' name='ss_update' id='ss_update' type='button' >
		<input class='button' onclick='return SUGAR.savedViews.saved_search_action("delete", "{sugar_translate label='LBL_DELETE_CONFIRM' module='SavedSearch'}")' value='{$APP.LBL_DELETE}' title='{$APP.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'>
		*}
		
		<br><span id='curr_search_name'></span>
        
        
        
        
            </td>
            <td class="help">
                {if $DISPLAY_SEARCH_HELP}
                    <img border='0' src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
                {/if}
            </td>
        </tr>
    {/if}
</table>

<script>
    {literal}
    if (typeof(loadSSL_Scripts) == 'function') {
        loadSSL_Scripts();
    }
    {/literal}
</script>
<script>
    {literal}
    $(document).ready(function () {
        $('#basic_search_link').one("click", function () {
            //alert( "This will be displayed only once." );
            SUGAR.searchForm.searchFormSelect('{/literal}{$module}{literal}|basic_search', '{/literal}{$module}{literal}|advanced_search');
        });
    });
    {/literal}
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['popup_query_form_modified_by_name_advanced']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_created_by_name_advanced']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_assigned_user_name_advanced']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_accounts_quote_quote_1_name_advanced']={"form":"popup_query_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["popup_query_form_accounts_quote_quote_1_name_advanced","accounts_quote_quote_1accounts_ida_advanced"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_quote_quote_1accounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_contact_name_c_advanced']={"form":"popup_query_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_c_advanced","contact_id_c_advanced","contact_id_c_advanced","contact_id_c_advanced"],"required_list":["contact_id_c"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_quote_quote_leads_name_advanced']={"form":"popup_query_form","method":"query","modules":["Leads"],"group":"or","field_list":["name","id"],"populate_list":["quote_quote_leads_name_advanced","quote_quote_leadsleads_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_contact_name_shipping_c_advanced']={"form":"popup_query_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_shipping_c_advanced","contact_id1_c_advanced","contact_id1_c_advanced","contact_id1_c_advanced"],"required_list":["contact_id1_c"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_quote_quote_opportunities_name_advanced']={"form":"popup_query_form","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["quote_quote_opportunities_name_advanced","quote_quote_opportunitiesopportunities_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['popup_query_form_quote_quote_accounts_name_advanced']={"form":"popup_query_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["popup_query_form_quote_quote_accounts_name_advanced","quote_quote_accountsaccounts_ida_advanced"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["quote_quote_accountsaccounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}
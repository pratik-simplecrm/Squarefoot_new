
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='name_advanced'>{sugar_translate label='LBL_NAME' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{if strlen($fields.name_advanced.value) <= 0}
{assign var="value" value=$fields.name_advanced.default_value }
{else}
{assign var="value" value=$fields.name_advanced.value }
{/if}  
<input type='text' name='{$fields.name_advanced.name}' 
    id='{$fields.name_advanced.name}' size='30' 
    maxlength='150' 
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='website_advanced'>{sugar_translate label='LBL_WEBSITE' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
	{if !empty($fields.website_advanced.value)}
	<input type='text' name='{$fields.website_advanced.name}' id='{$fields.website_advanced.name}' size='30' 
	   maxlength='255' value='{$fields.website_advanced.value}' title='' tabindex=''  >
	{else}
	<input type='text' name='{$fields.website_advanced.name}' id='{$fields.website_advanced.name}' size='30' 
	   maxlength='255'	   	   {if $displayView=='advanced_search'||$displayView=='basic_search'}value=''{else}value='http://'{/if} 
	    title='' tabindex=''  >
	{/if}

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='date_modified_advanced'>{sugar_translate label='LBL_DATE_MODIFIED' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="id" value=$fields.date_modified_advanced.name }

{if isset($smarty.request.date_modified_advanced_range_choice)}
{assign var="starting_choice" value=$smarty.request.date_modified_advanced_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<div class="clear hidden dateTimeRangeChoiceClear"></div>
<div class="dateTimeRangeChoice" style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.date_modified_advanced.options selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.range_date_modified_advanced)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.range_date_modified_advanced) && !empty($smarty.request.date_modified_advanced)}{$smarty.request.date_modified_advanced}{else}{$smarty.request.range_date_modified_advanced}{/if}' title=''   size="11" class="dateRangeInput">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=$fields.date_modified_advanced.value }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.start_range_date_modified_advanced }' title=''  tabindex='' size="11" class="rangeDateInput">
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
{$APP.LBL_AND}
{assign var=date_value value=$fields.date_modified_advanced.value }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.end_range_date_modified_advanced }' title=''  tabindex='' size="11" class="dateRangeInput" maxlength="10">
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     document.getElementById("range_{$id}").value = '[' + val + ']';    
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
    //register on basic search form button if it exists
    if(document.getElementById('search_form_submit'))
     {ldelim}
         YAHOO.util.Event.addListener('search_form_submit', 'click',{$id}_range_validate);
     {rdelim}
    //register on advanced search submit button if it exists
   if(document.getElementById('search_form_submit_advanced'))
    {ldelim}
        YAHOO.util.Event.addListener('search_form_submit_advanced', 'click',{$id}_range_validate);
    {rdelim}

{rdelim});

// this function is specific to range date searches and will check that both start and end date ranges have been
// filled prior to submitting search form.  It is called from the listener added above.
function {$id}_range_validate(e){ldelim}
    if (
            (document.getElementById("start_range_{$id}").value.length >0 && document.getElementById("end_range_{$id}").value.length == 0)
          ||(document.getElementById("end_range_{$id}").value.length >0 && document.getElementById("start_range_{$id}").value.length == 0)
       )
    {ldelim}
        e.preventDefault();
        alert('{$APP.LBL_CHOOSE_START_AND_END_DATES}');
        if (document.getElementById("start_range_{$id}").value.length == 0) {ldelim}
            document.getElementById("start_range_{$id}").focus();
        {rdelim}
        else {ldelim}
            document.getElementById("end_range_{$id}").focus();
        {rdelim}
    {rdelim}

{rdelim}

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='email_advanced'>{sugar_translate label='LBL_ANY_EMAIL' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{if strlen($fields.email_advanced.value) <= 0}
{assign var="value" value=$fields.email_advanced.default_value }
{else}
{assign var="value" value=$fields.email_advanced.value }
{/if}  
<input type='text' name='{$fields.email_advanced.name}' 
    id='{$fields.email_advanced.name}' size='30' 
     
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='date_entered_advanced'>{sugar_translate label='LBL_DATE_ENTERED' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="id" value=$fields.date_entered_advanced.name }

{if isset($smarty.request.date_entered_advanced_range_choice)}
{assign var="starting_choice" value=$smarty.request.date_entered_advanced_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<div class="clear hidden dateTimeRangeChoiceClear"></div>
<div class="dateTimeRangeChoice" style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.date_entered_advanced.options selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.range_date_entered_advanced)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.range_date_entered_advanced) && !empty($smarty.request.date_entered_advanced)}{$smarty.request.date_entered_advanced}{else}{$smarty.request.range_date_entered_advanced}{/if}' title=''   size="11" class="dateRangeInput">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=$fields.date_entered_advanced.value }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.start_range_date_entered_advanced }' title=''  tabindex='' size="11" class="rangeDateInput">
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
{$APP.LBL_AND}
{assign var=date_value value=$fields.date_entered_advanced.value }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.end_range_date_entered_advanced }' title=''  tabindex='' size="11" class="dateRangeInput" maxlength="10">
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     document.getElementById("range_{$id}").value = '[' + val + ']';    
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
    //register on basic search form button if it exists
    if(document.getElementById('search_form_submit'))
     {ldelim}
         YAHOO.util.Event.addListener('search_form_submit', 'click',{$id}_range_validate);
     {rdelim}
    //register on advanced search submit button if it exists
   if(document.getElementById('search_form_submit_advanced'))
    {ldelim}
        YAHOO.util.Event.addListener('search_form_submit_advanced', 'click',{$id}_range_validate);
    {rdelim}

{rdelim});

// this function is specific to range date searches and will check that both start and end date ranges have been
// filled prior to submitting search form.  It is called from the listener added above.
function {$id}_range_validate(e){ldelim}
    if (
            (document.getElementById("start_range_{$id}").value.length >0 && document.getElementById("end_range_{$id}").value.length == 0)
          ||(document.getElementById("end_range_{$id}").value.length >0 && document.getElementById("start_range_{$id}").value.length == 0)
       )
    {ldelim}
        e.preventDefault();
        alert('{$APP.LBL_CHOOSE_START_AND_END_DATES}');
        if (document.getElementById("start_range_{$id}").value.length == 0) {ldelim}
            document.getElementById("start_range_{$id}").focus();
        {rdelim}
        else {ldelim}
            document.getElementById("end_range_{$id}").focus();
        {rdelim}
    {rdelim}

{rdelim}

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='archi_advanced'>{sugar_translate label='LBL_ARCHI' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{html_options id='archi_advanced' name='archi_advanced[]' options=$fields.archi_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.archi_advanced.value}
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='address_city_advanced'>{sugar_translate label='LBL_CITY' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{if strlen($fields.address_city_advanced.value) <= 0}
{assign var="value" value=$fields.address_city_advanced.default_value }
{else}
{assign var="value" value=$fields.address_city_advanced.value }
{/if}  
<input type='text' name='{$fields.address_city_advanced.name}' 
    id='{$fields.address_city_advanced.name}' size='30' 
     
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='address_state_advanced'>{sugar_translate label='LBL_STATE' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{if strlen($fields.address_state_advanced.value) <= 0}
{assign var="value" value=$fields.address_state_advanced.default_value }
{else}
{assign var="value" value=$fields.address_state_advanced.value }
{/if}  
<input type='text' name='{$fields.address_state_advanced.name}' 
    id='{$fields.address_state_advanced.name}' size='30' 
     
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='assigned_user_id_advanced'>{sugar_translate label='LBL_ASSIGNED_TO' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{html_options id='assigned_user_id_advanced' name='assigned_user_id_advanced[]' options=$fields.assigned_user_id_advanced.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.assigned_user_id_advanced.value}
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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='pharmaceutical_advanced'>{sugar_translate label='LBL_PHARMACEUTICAL' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.pharmaceutical_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.pharmaceutical_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.pharmaceutical_advanced.name}" name="{$fields.pharmaceutical_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='educational_institution_advanced'>{sugar_translate label='LBL_EDUCATIONAL_INSTITUTION' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.educational_institution_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.educational_institution_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.educational_institution_advanced.name}" name="{$fields.educational_institution_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='hospital_advanced'>{sugar_translate label='LBL_HOSPITAL' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.hospital_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.hospital_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.hospital_advanced.name}" name="{$fields.hospital_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='hotels_advanced'>{sugar_translate label='LBL_HOTELS' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.hotels_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.hotels_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.hotels_advanced.name}" name="{$fields.hotels_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='residential_advanced'>{sugar_translate label='LBL_RESIDENTIAL' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.residential_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.residential_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.residential_advanced.name}" name="{$fields.residential_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='retail_advanced'>{sugar_translate label='LBL_RETAIL' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.retail_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.retail_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.retail_advanced.name}" name="{$fields.retail_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='sports_advanced'>{sugar_translate label='LBL_SPORTS' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.sports_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.sports_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.sports_advanced.name}" name="{$fields.sports_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='others_advanced'>{sugar_translate label='LBL_OTHERS' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.others_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.others_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.others_advanced.name}" name="{$fields.others_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

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

        <td scope="row" nowrap="nowrap" width='8.3333333333333%'>
                        <label for='current_user_only_advanced'>{sugar_translate label='LBL_CURRENT_USER_FILTER' module='Arch_Architectural_Firm'}</label>
                    </td>
        <td nowrap="nowrap" width='25%'>
                        
{if strval($fields.current_user_only_advanced.value) == "1" || strval($fields.current_user_only_advanced.value) == "yes" || strval($fields.current_user_only_advanced.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.current_user_only_advanced.name}" value="0"> 
<input type="checkbox" id="{$fields.current_user_only_advanced.name}" 
name="{$fields.current_user_only_advanced.name}" 
value="1" title='' tabindex="" {$checked} >
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
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>{/literal}
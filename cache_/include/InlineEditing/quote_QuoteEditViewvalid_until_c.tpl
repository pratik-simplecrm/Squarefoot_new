
<span class="dateTime">
{assign var=date_value value=$fields.valid_until_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.valid_until_c.name}" id="{$fields.valid_until_c.name}" value="{$date_value}" title=''  tabindex='1'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.valid_until_c.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.valid_until_c.name}",
form : "",
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

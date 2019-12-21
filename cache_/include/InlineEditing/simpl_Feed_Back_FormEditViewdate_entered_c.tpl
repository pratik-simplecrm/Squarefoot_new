
{if strlen($fields.date_entered_c.value) <= 0}
{assign var="value" value=$fields.date_entered_c.default_value }
{else}
{assign var="value" value=$fields.date_entered_c.value }
{/if}  
<input type='text' name='{$fields.date_entered_c.name}' 
    id='{$fields.date_entered_c.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >
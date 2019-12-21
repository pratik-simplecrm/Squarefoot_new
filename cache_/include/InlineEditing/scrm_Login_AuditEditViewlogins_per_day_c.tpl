
{if strlen($fields.logins_per_day_c.value) <= 0}
{assign var="value" value=$fields.logins_per_day_c.default_value }
{else}
{assign var="value" value=$fields.logins_per_day_c.value }
{/if}  
<input type='text' name='{$fields.logins_per_day_c.name}' 
id='{$fields.logins_per_day_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='1'    >
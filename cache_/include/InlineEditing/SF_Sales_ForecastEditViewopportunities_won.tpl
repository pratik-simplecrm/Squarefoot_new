
{if strlen($fields.opportunities_won.value) <= 0}
{assign var="value" value=$fields.opportunities_won.default_value }
{else}
{assign var="value" value=$fields.opportunities_won.value }
{/if}  
<input type='text' name='{$fields.opportunities_won.name}' 
id='{$fields.opportunities_won.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >
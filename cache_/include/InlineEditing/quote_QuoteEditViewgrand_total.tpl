
{if strlen($fields.grand_total.value) <= 0}
{assign var="value" value=$fields.grand_total.default_value }
{else}
{assign var="value" value=$fields.grand_total.value }
{/if}  
<input type='text' name='{$fields.grand_total.name}' 
id='{$fields.grand_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >

{if strlen($fields.sales_target.value) <= 0}
{assign var="value" value=$fields.sales_target.default_value }
{else}
{assign var="value" value=$fields.sales_target.value }
{/if}  
<input type='text' name='{$fields.sales_target.name}' 
id='{$fields.sales_target.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >
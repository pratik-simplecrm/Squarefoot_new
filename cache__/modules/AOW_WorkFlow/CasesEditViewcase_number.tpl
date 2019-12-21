
{if strlen($fields.case_number.value) <= 0}
{assign var="value" value=$fields.case_number.default_value }
{else}
{assign var="value" value=$fields.case_number.value }
{/if}  
<input type='text' name='{$fields.case_number.name}' 
id='{$fields.case_number.name}' size='30' maxlength='11' value='{$value}' title='' tabindex='1'    >
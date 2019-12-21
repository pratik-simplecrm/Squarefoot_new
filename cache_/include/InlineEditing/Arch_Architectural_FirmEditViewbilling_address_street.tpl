
{if strlen($fields.billing_address_street.value) <= 0}
{assign var="value" value=$fields.billing_address_street.default_value }
{else}
{assign var="value" value=$fields.billing_address_street.value }
{/if}  
<input type='text' name='{$fields.billing_address_street.name}' 
    id='{$fields.billing_address_street.name}' size='30' 
    maxlength='150' 
    value='{$value}' title=''  tabindex='1'      >
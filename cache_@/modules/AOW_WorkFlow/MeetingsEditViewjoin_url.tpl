
{if strlen($fields.join_url.value) <= 0}
{assign var="value" value=$fields.join_url.default_value }
{else}
{assign var="value" value=$fields.join_url.value }
{/if}  
<input type='text' name='{$fields.join_url.name}' 
    id='{$fields.join_url.name}' size='30' 
    maxlength='200' 
    value='{$value}' title=''  tabindex='1'      >
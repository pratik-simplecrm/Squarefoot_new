
{if strlen($fields..value) <= 0}
{assign var="value" value=$fields..default_value }
{else}
{assign var="value" value=$fields..value }
{/if}  
<input type='text' name='{$fields..name}' 
    id='{$fields..name}' size='30' 
     
    value='{$value}' title=''  tabindex='1'      >
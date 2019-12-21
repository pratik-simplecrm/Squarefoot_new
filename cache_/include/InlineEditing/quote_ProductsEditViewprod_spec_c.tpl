
{if empty($fields.prod_spec_c.value)}
{assign var="value" value=$fields.prod_spec_c.default_value }
{else}
{assign var="value" value=$fields.prod_spec_c.value }
{/if}




<textarea  id='{$fields.prod_spec_c.name}' name='{$fields.prod_spec_c.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}
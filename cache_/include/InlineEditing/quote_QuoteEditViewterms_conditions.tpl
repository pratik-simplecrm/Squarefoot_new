
{if empty($fields.terms_conditions.value)}
{assign var="value" value=$fields.terms_conditions.default_value }
{else}
{assign var="value" value=$fields.terms_conditions.value }
{/if}




<textarea  id='{$fields.terms_conditions.name}' name='{$fields.terms_conditions.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}
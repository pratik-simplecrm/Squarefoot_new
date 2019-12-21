

{if is_string($fields.sales_stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.options }">
{ $fields.sales_stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.value }">
{ $fields.sales_stage.options[$fields.sales_stage.value]}
{/if}

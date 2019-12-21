
 
{if !empty($fields.opportunities_cases_1opportunities_ida.value)}
{capture assign="detail_url"}index.php?module=Opportunities&action=DetailView&record={$fields.opportunities_cases_1opportunities_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="opportunities_cases_1opportunities_ida" class="sugar_field" data-id-value="{$fields.opportunities_cases_1opportunities_ida.value}">{$fields.opportunities_cases_1_name.value}</span>
{if !empty($fields.opportunities_cases_1opportunities_ida.value)}</a>{/if}

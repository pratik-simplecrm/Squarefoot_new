
 
{if !empty($fields.scrm_warehouse_person_id_c.value)}
{capture assign="detail_url"}index.php?module=scrm_Warehouse_Person&action=DetailView&record={$fields.scrm_warehouse_person_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="scrm_warehouse_person_id_c" class="sugar_field" data-id-value="{$fields.scrm_warehouse_person_id_c.value}">{$fields.warehouse_person_c.value}</span>
{if !empty($fields.scrm_warehouse_person_id_c.value)}</a>{/if}
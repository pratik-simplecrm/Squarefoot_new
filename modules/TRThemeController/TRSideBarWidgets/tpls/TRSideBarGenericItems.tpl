<ul {if $closed === true || $closed == "true"}style="display:none"{/if}>
{foreach from=$items item=item key=itemcount name=itemList}
    {if $item.item_summary_short != ''}
        <li title="{$item.module_name}: {$item.item_summary}">
            <a href="index.php?module={$item.module_name}&action=DetailView&record={$item.item_id}">
                <span>{$item.item_summary_short}</span>
            </a>
            <div class="moduleIcon">
                <img src={sugar_getimagepath file=$item.module_name|cat:".gif"}>
            </div>
            <div class="changeIcon">
                <a title="{$item.module_name}: {$item.item_summary}" href="index.php?module={$item.module_name}&action=EditView&record={$item.item_id}">
                    <img src={sugar_getimagepath file="edit_inline.gif"}>
                </a>
            </div>
        </li>
    {else}
        {$NTC_NO_ITEMS_DISPLAY}
    {/if}
{/foreach}
</ul>
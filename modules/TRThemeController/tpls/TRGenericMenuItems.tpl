<ul class="itemMenuLv"><span class="itemMenuHeader">{$title}</span>
    {foreach from=$items item=item key=itemcount name=itemList}
        <li>
            <a href="index.php?module={$item.module_name}&action=DetailView&record={$item.item_id}">{$item.item_summary_short}</a>
            <div class="editlink">
                <a href="index.php?module={$item.module_name}&action=EditView&record={$item.item_id}">
                    <img src={sugar_getimagepath file="dashlet-header-edit.gif"}/>
                </a>
            </div>
        </li>

    {/foreach}
</ul>

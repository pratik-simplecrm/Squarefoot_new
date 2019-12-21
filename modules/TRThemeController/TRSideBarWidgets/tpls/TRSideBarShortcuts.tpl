
<ul {if $closed === true || $closed == "true"}style="display:none"{/if}>
    {foreach from=$shortcuts item=shortcut key=chortcutcountcount name=shortcutList}
        <li style="white-space:nowrap;">
            {if $item.URL != ''}
                <span>{$shortcut.LABEL}</span>
            {else}
                <a href="{$shortcut.URL}"><span>{$shortcut.LABEL}</span></a>
            {/if}
        </li>
    {/foreach}
</ul>
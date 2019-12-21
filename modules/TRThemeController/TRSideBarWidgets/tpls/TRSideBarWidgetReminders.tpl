<ul {if $closed == true}style="display:none"{/if}>
    {foreach from=$reminders item=reminder key=reminderitem name=reminderList}

        <li id='reminder{$reminder.bean_id}'>
            <div class='favitemDetails'>
                <img class="closeIcon" src={sugar_getimagepath file="close_inline.gif"} onclick="twentyreasonstheme.removeReminderById('{$reminder.bean_id}');"></img>&nbsp;
                <span style="float:left">{$reminder.reminder_date}
            </div>  
            <div>
                <a title="{$reminder.bean}: {$reminder.summary}" href="index.php?module={$reminder.bean}&action=DetailView&record={$reminder.bean_id}">
                    <span>{$reminder.summary}</span>
                </a>
                <div class="moduleIcon">
                    <img src={sugar_getimagepath file=$reminder.bean|cat:".gif"}>
                </div>
                <div class="changeIcon">
                    <a title="{$reminder.bean}: {$reminder.summary}"href="index.php?module={$reminder.bean}&action=EditView&record={$reminder.bean_id}">
                        <img src={sugar_getimagepath file="edit_inline.gif"}>
                    </a>
                </div>
            </div>  
        </li>
    {/foreach}
</ul>
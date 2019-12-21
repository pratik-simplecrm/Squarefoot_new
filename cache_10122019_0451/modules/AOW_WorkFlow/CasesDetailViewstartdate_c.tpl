

    {if strlen($fields.startdate_c.value) <= 0}
        {assign var="value" value=$fields.startdate_c.default_value }
    {else}
        {assign var="value" value=$fields.startdate_c.value }
    {/if}



<span class="sugar_field" id="{$fields.startdate_c.name}">{$value}</span>

<ul class="sidebarBoxList latestBans">
    {foreach from=$playerlist item=player}
        <li class="box24">
            <span><img src="{$player.avatar}" style="width:24px"></span>
            <div class="sidebarBoxHeadline">
                <a href="{GAMEME_URL|trim}/playerinfo/{$player.id}">{$player.name}</a>
                <br>
                <small>{$player.uniqueid}</small>
            </div>
        </li>
    {/foreach}
</ul>
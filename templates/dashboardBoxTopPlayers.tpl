<ul class="sidebarBoxList latestBans">
    {foreach from=$playerlist item=player}
        <li class="box24">
            <a href="{GAMEME_URL|trim}/playerinfo/{$player.id}" class="framed">
                <img class="userAvatarImage"src="{$player.avatar}" style="width:24px">
            </a>
            <div class="sidebarBoxHeadline">
                <a href="{GAMEME_URL|trim}/playerinfo/{$player.id}">{$player.name}</a>
                <br>
                <small>Punkte: {$player.points}</small>
            </div>
        </li>
    {/foreach}
</ul>
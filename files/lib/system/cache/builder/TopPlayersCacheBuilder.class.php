<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.02.2017
 * Time: 17:16
 */

namespace wcf\system\cache\builder;

use wcf\data\gameme\GameMe;
use wcf\system\WCF;

class TopPlayersCacheBuilder extends AbstractCacheBuilder
{
    /**
     * @see	\wcf\system\cache\builder\AbstractCacheBuilder::$maxLifetime
     */
    protected $maxLifetime = SERVERLIST_REFRESH;

    private $gameme;

    protected function init() {
        $this->gameMe = new GameMe(GAMEME_GAME, GAMEME_URL, GAMEME_LIMIT);
    }

    /**
     * @see	\wcf\system\cache\builder\AbstractCacheBuilder::rebuild()
     */
    protected function rebuild(array $parameters) {
        $xml = $this->gameme->getTopPlayers();

        $players = array();

        foreach ($xml->playerlist->player as $player)
        {
            $new_player = array();
            $new_player['name'] = (string) $player->name;
            $new_player['avatar'] = (string) $player->avatar;
            $new_player['id'] = $player->id;
            $new_player['uniqueid'] = (string) $player->uniqueid;
            $new_player['points'] = $player->skill;
            $players[] = $new_player;
        }

        return $players;
    }
}
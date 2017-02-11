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
    protected $maxLifetime = GAMEME_REFRESH;

    private $gameme;

    /**
     * @see	\wcf\system\cache\builder\AbstractCacheBuilder::rebuild()
     */
    public function rebuild(array $parameters) {
        if($this->gameme == null)
            $this->gameme = new GameMe(GAMEME_GAME, GAMEME_URL, GAMEME_LIMIT);
        $xml = $this->gameme->getTopPlayers();

        $players = array();

        foreach ($xml->playerlist->player as $player)
        {
            $new_player = array();
            $new_player['name'] = (string) $player->name;
            $new_player['avatar'] = (string) $player->avatar;
            $new_player['id'] = (string) $player->id;
            $new_player['uniqueid'] = (string) $player->uniqueid;
            $new_player['points'] = (string) $player->skill;
            $players[] = $new_player;
        }

        return $players;
    }
}
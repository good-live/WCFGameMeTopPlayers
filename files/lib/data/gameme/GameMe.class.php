<?php
namespace wcf\data\gameme;

/**
 * Created by PhpStorm.
 * User: good_live
 * Date: 21.01.2017
 * Time: 21:25
 */
class GameMe
{
    private $game;
    private $url;
    private $limit;
    function __construct($game, $url, $limit)
    {
        $this->game = $game;
        if (strpos($url, "/api") === FALSE) {
            $url .= "/api";
        }
        $this->url = $url;
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getGameMeTopPlayers()
    {
        $xml = simplexml_load_file($this->url . "/playerlist/csgo?limit=" . $this->limit);
        $players = array();
        foreach ($xml->playerlist->player as $player)
        {
            $new_player = array();
            $new_player['name'] = (string) $player->name;
            $new_player['avatar'] = (string) $player->avatar;
            $new_player['id'] = $player->id;
            $new_player['uniqueid'] = (string) $player->uniqueid;
            $players[] = $new_player;
        }
        return $players;
    }
}
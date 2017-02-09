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
    public function getTopPlayers()
    {
        return simplexml_load_file($this->url . "/playerlist/csgo?limit=" . $this->limit);;
    }
}
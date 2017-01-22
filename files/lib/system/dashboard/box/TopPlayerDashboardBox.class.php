<?php

namespace wcf\system\dashboard\box;

use wcf\data\dashboard\box\DashboardBox;
use wcf\data\gameme\GameMe;
use wcf\page\IPage;
use wcf\system\WCF;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.01.2017
 * Time: 22:12
 */
class TopPlayerDashboardBox extends AbstractSidebarDashboardBox
{
    protected $list;

    /**
     * @see \wcf\system\dashboard\box\IDashboardBox::init()
     */
    public function init(DashboardBox $box, IPage $page) {
        parent::init($box, $page);

        $gameMe = new GameMe(GAMEME_GAME, GAMEME_URL, GAMEME_LIMIT);
        $this->list = $gameMe->getGameMeTopPlayers();
    }

    /**
     * @see \wcf\system\dashboard\box\AbstractDashboardBoxContent::render()
     */
    protected function render() {
        WCF::getTPL()->assign(array(
            'playerlist' => ($this->list)
        ));
        return WCF::getTPL()->fetch('dashboardBoxTopPlayers');
    }
}
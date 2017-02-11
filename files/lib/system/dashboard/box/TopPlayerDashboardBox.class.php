<?php

namespace wcf\system\dashboard\box;

use wcf\data\dashboard\box\DashboardBox;
use wcf\page\IPage;
use wcf\system\WCF;
use wcf\system\cache\builder\TopPlayersCacheBuilder;

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

        $this->list = TopPlayersCacheBuilder::getInstance()->getData();
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
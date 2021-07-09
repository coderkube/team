<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Controller\Adminhtml\Member;

class NewAction extends \Coderkube\Team\Controller\Adminhtml\Member
{
    public function execute()
    {
        $this->_forward('edit');
    }
}

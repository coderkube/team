<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('coderkube_team_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Member'));
    }
}

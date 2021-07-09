<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Block;

class FooterLink extends \Magento\Framework\View\Element\Html\Link
{
    public function _toHtml()
    {
        if (
            !$this->_scopeConfig->isSetFlag('team_tab/general/enable') ||
            !$this->_scopeConfig->isSetFlag('team_tab/general/footerlink')
        ) {
            return '';
        }
        return parent::_toHtml();
    }
}

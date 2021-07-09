<?php
/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */
namespace Coderkube\Team\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'category';
        $this->_headerText = __('Category');
        $this->_addButtonLabel = __('Add New Department');
        parent::_construct();
    }
}

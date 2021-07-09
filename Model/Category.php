<?php
/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */
namespace Coderkube\Team\Model;

use Magento\Framework\Model\AbstractModel;

class Category extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Coderkube\Team\Model\ResourceModel\Category');
    }
}

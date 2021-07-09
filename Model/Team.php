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
use Magento\Framework\App\ObjectManager;

class Team extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Coderkube\Team\Model\ResourceModel\Team');
        $cacheManager = ObjectManager::getInstance()->get('\Magento\Framework\App\Cache\Manager');
        $types = ['config','layout','block_html','collections','reflection','db_ddl','eav','config_integration','config_integration_api','full_page','translate','config_webservice'];
        $cacheManager->flush($types);
    }
}

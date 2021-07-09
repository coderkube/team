<?php
/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */
namespace Coderkube\Team\Model\ResourceModel\Category;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'cat_id';
    
    protected function _construct()
    {
        $this->_init(
            'Coderkube\Team\Model\Category',
            'Coderkube\Team\Model\ResourceModel\Category'
        );
    }
}

<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Block;

use Coderkube\Team\Model\TeamFactory;
use Coderkube\Team\Model\CategoryFactory;

class Member extends \Magento\Framework\View\Element\Template
{
    protected $_team;
    protected $_category;
    protected $_storeManager;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        TeamFactory $team,
        CategoryFactory $category
    ) {
        $this->_team = $team;
        $this->_category = $category;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }
    public function _prepareLayout()
    {
        if ($this->getTeamCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'coderkube.team.pager'
            )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15])->setShowPerPage(true)->setCollection(
                $this->getTeamCollection()
            );
            $this->setChild('pager', $pager);
            $this->getTeamCollection()->load();
        }
        return parent::_prepareLayout();
    }
    public function getTeamCollection()
    {
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $team = $this->_team->create();
        $collection = $team->getCollection();
        $collection->setOrder('sortorder', 'ASC');
        $collection->addFieldToFilter('status', '1');
        $collection->setCurPage($page);
        return $collection;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    public function getStoreId()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $storeId;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->_storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl;
    }
    public function getCategoryCollection()
    {
        $category = $this->_category->create();
        $collectioncat = $category->getCollection();
        $collectioncat->setOrder('sortorder', 'ASC');
        $collectioncat->addFieldToFilter('status', '1');
        return $collectioncat;
    }
}

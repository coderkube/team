<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Controller\Adminhtml\Member;

class Index extends \Magento\Backend\App\Action
{
    private $resultPageFactory;
    protected $TeamFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Coderkube\Team\Model\TeamFactory $TeamFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->TeamFactory = $TeamFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__("Manage Members"));
        return $resultPage;
    }
}

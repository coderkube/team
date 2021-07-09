<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Store\Model\System\Store;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
    protected $_systemStore;
    protected $_categoryFactory;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Coderkube\Team\Model\Category $categoryFactory,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_systemStore = $systemStore;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    //fetch the data from coderkube_category table
    public function toOptionArray()
    {
        $category  = $this->_categoryFactory->getCollection()->addFieldToFilter('status', 1);
        $attributesArrays = [];
        foreach ($category as $categories) {
            $attributesArrays[] = [
                'label' => $categories->getCategoryName(),
                'value' => $categories->getCatId()
            ];
        }
        return $attributesArrays;
    }
    public function getTabLabel()
    {
        return __('Member Information');
    }
    public function getTabTitle()
    {
        return __('Member Information');
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_coderkube_team_items');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);
        if ($model->getId()) {
            $fieldset->addField('member_id', 'hidden', ['name' => 'member_id']);
        }
        $fieldset->addField(
            'member_name',
            'text',
            ['name' => 'member_name', 'label' => __('Member Name'), 'title' => __('Member Name'), 'required' => true]
        );
        $fieldset->addField(
            'designation',
            'text',
            ['name' => 'designation', 'label' => __('Designation'), 'title' => __('Designation'), 'required' => true]
        );
        $fieldset->addField(
            'email_id',
            'text',
            [
                'name' => 'email_id',
                'label' => __('Email Id'),
                'title' => __('Email Id'),
                'required' => true,
            ]
        );
        $fieldset->addField(
            'content',
            'editor',
            [
                'name' => 'content',
                'label' => __('Content'),
                'title' => __('Content'),
                'style' => 'height:26em;',
                'required' => true,
                'config'    => $this->_wysiwygConfig->getConfig(),
                'wysiwyg' => true
            ]
        );
        $fieldset->addField(
            'fb_link',
            'text',
            [
                'name' => 'fb_link', 'label' => __('Facebook Username'), 'title' => __('Facebook UserName'), 'required' => true,
                'note' => 'Please add your facebook username here (FOR EX.:-CoderKube)'
            ]
        );
        $fieldset->addField(
            'google_link',
            'text',
            [
                'name' => 'google_link', 'label' => __('Linkedin Username'), 'title' => __('Linkedin UserName'), 'required' => true,
                'note' => 'Please add your linkedin username here (FOR EX.:-company/coderkubetechnologies)'
            ]
        );
        $fieldset->addField(
            'twitter_link',
            'text',
            [
                'name' => 'twitter_link', 'label' => __('Twitter Username'), 'title' => __('Twitter UserName'), 'required' => true,
                'note' => 'Please add your Twitter username here (FOR EX.:-coderkube)'
            ]
        );
        $fieldset->addField('category_name', 'select', [
            'name'     => 'category_name',
            'label'    => __('Department Name'),
            'title'    => __('Department Name'),
            'required' => true,
            'values'   => $this->toOptionArray()
        ]);
        $fieldset->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Profile Image'),
                'title' => __('Image'),
                'required'  => false
            ]
        );
        $fieldset->addField(
            'sortorder',
            'text',
            ['name' => 'sortorder', 'label' => __('Sort Order'), 'title' => __('Sort Order'), 'required' => true]
        );
        $fieldset->addField(
            'status',
            'select',
            ['name' => 'status', 'label' => __('Status'), 'title' => __('Status'),  'options'   => [0 => 'Disable', 1 => 'Enable'], 'required' => true]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}

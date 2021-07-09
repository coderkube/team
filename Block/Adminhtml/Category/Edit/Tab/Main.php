<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */

namespace Coderkube\Team\Block\Adminhtml\Category\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Store\Model\System\Store;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
    protected $_systemStore;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    public function getTabLabel()
    {
        return __('Department Information');
    }
    public function getTabTitle()
    {
        return __('Department Information');
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
        $model = $this->_coreRegistry->registry('current_coderkube_team_category');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('category_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Department Information')]);
        if ($model->getId()) {
            $fieldset->addField('cat_id', 'hidden', ['name' => 'cat_id']);
        }
        $fieldset->addField(
            'category_name',
            'text',
            ['name' => 'category_name', 'label' => __('Department Name'), 'title' => __('Department Name'), 'required' => true]
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

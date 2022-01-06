<?php

namespace Albedo\BlurryVision\Block\Adminhtml\Form\Field;

class SelectorItems extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray{

    protected $elementFactory;
    protected $renderersPool;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Data\Form\Element\Factory $elementFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->elementFactory = $elementFactory;
    }


    protected function _prepareToRender()
    {
        $this->addColumn('label', ['label' => __('Label'), 'class' => '']);
        $this->addColumn('selector', ['label' => __('CSS Selector'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add new selector');
    }
}

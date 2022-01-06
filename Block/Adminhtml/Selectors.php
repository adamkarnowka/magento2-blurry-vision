<?php

namespace Albedo\BlurryVision\Block\Adminhtml;

class Selectors extends \Magento\Backend\Block\Template {

    protected $configuration;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Albedo\BlurryVision\Helper\Configuration $configuration,
        array $data = [],
        ?\Magento\Framework\Json\Helper\Data $jsonHelper = null,
        ?\Magento\Directory\Helper\Data $directoryHelper = null)
    {
        $this->configuration = $configuration;
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
    }

    public function isEnabled(){
        return $this->configuration->getEnabled();
    }

    public function getSelectorsJson(){
        $selectorJson = $this->configuration->getSelectors();
        return $selectorJson;
    }

    public function getSelectorsCss(){
        $cssSelectorsDeclaration = [];
        $selectorArray = $this->configuration->getSelectors(\Albedo\BlurryVision\Helper\Configuration::SELECTORS_RESULT_TYPE_ARRAY);
        foreach($selectorArray as $key=>$value){
            $cssSelectorsDeclaration[] = $value['selector'];
        }

        return implode(', ', $cssSelectorsDeclaration);
    }

    public function getBlurStrength(){
        return $this->configuration->getBlurStrength();
    }
}

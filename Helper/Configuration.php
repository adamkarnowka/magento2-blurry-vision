<?php

namespace Albedo\BlurryVision\Helper;

class Configuration  extends \Magento\Framework\App\Helper\AbstractHelper{

    public const XML_KEY_BLURRY_VISION_ENABLED = 'admin/blurry_vision/enabled';
    public const XML_KEY_BLURRY_VISION_SELECTORS = 'admin/blurry_vision/selectors';
    public const XML_KEY_BLURRY_VISION_BLUR_STRENGTH = 'admin/blurry_vision/blur_strength';

    public const SELECTORS_RESULT_TYPE_JSON = 'json';
    public const SELECTORS_RESULT_TYPE_ARRAY = 'array';

    protected $jsonHelper;
    protected $selectorsComposite;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Albedo\BlurryVision\Model\SelectorsComposite $selectorsComposite
    )
    {
        $this->jsonHelper = $jsonHelper;
        $this->selectorsComposite = $selectorsComposite;
        parent::__construct($context);
    }

    public function getEnabled(){
        return $this->scopeConfig->getValue(self::XML_KEY_BLURRY_VISION_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getSelectors($format = self::SELECTORS_RESULT_TYPE_JSON){
        $hardcodedSelectors = $this->selectorsComposite->getSelectors();

        $configuredSelectorsJson = $this->scopeConfig->getValue(self::XML_KEY_BLURRY_VISION_SELECTORS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $configuredSelectors = $this->jsonHelper->jsonDecode($configuredSelectorsJson);

        $selectors = array_merge($configuredSelectors, $hardcodedSelectors);

        if($format == self::SELECTORS_RESULT_TYPE_JSON) {
            return $this->jsonHelper->jsonEncode($selectors);
        }

        return $selectors;
    }

    public function getBlurStrength(){
        return $this->scopeConfig->getValue(self::XML_KEY_BLURRY_VISION_BLUR_STRENGTH, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}

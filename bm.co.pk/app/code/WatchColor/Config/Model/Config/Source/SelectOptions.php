<?php

namespace WatchColor\Config\Model\Config\Source;
    use Magento\Framework\Data\OptionSourceInterface;
    use \Magento\Eav\Model\Config;
    class SelectOptions implements OptionSourceInterface
    {
        /**
         * @var Config
         */
        protected $_eavConfig;
    
        /**
         * @param Config $eavConfig
         */
        public function __construct(
            Config           $eavConfig
        )
        {
            $this->_eavConfig = $eavConfig;
        }
        /**
         * {@inheritdoc}
         */
        public function toOptionArray()
        {
            $coloOptions = $this->getColorOption();
            return $coloOptions;
        }
        protected function getColorOption()
        {
            $attribute = $this->_eavConfig->getAttribute('catalog_product', 'color'); //color is product attribute.
            $options = $attribute->getSource()->getAllOptions();
            $optionsExists = array();
            return $options;
        }
    
    }

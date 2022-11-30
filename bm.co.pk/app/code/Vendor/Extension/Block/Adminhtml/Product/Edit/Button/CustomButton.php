<?php
 
namespace Vendor\Extension\Block\Adminhtml\Product\Edit\Button;
 
class CustomButton extends \Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic
{
    public function getButtonData()
    {
        return [
            'label' => __('Custom Button'),
            'class' => 'action-secondary',
            'on_click' => 'alert("Hello World")',
            'sort_order' => 10
        ];
 
    }
}
<?php
namespace WatchColor\Config\Observer;
use Magento\Framework\Event\ObserverInterface;
class ProductSaveAfter implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $value = \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Framework\App\Config\ScopeConfigInterface::class)
        ->getValue('job/general/select_options', \Magento\Store\Model\ScopeInterface::SCOPE_STORE,);
        $instance = \Magento\Framework\App\ObjectManager::getInstance();
        $productId = (int)$observer->getProduct()->getId();
        $event = $observer->getEvent();
        $product = $event->getProduct();
        $watch_color = $product->getCustomAttribute('watch_color');
        
        if ($value == "49")
        {
            $config_color = "black";
        }
        else if ($value == "50")
        {
            $config_color = "blue";
        }
        else if ($value == "51")
        {
            $config_color = "brown";
        }
        else if ($value == "52")
        {
            $config_color = "gray";
        }
        else if ($value == "53")
        {
            $config_color = "green";
        }
        else if ($value == "54")
        {
            $config_color = "lavender";
        }
        else if ($value == "55")
        {
            $config_color = "multi";
        }
        else if ($value == "56")
        {
            $config_color = "orang";
        }
        else if ($value == "57")
        {
            $config_color = "purpel";
        }
        else if ($value == "58")
        {
            $config_color = "red";
        }
        else if ($value == "59")
        {
            $config_color = "white";
        }
        else if ($value == "60")
        {
            $config_color = "yellow";
        }
       
        if ($watch_color == "")
        {
            $action = $instance->create('Magento\Catalog\Model\Product\Action');
            $event = $observer->getEvent();
            $product = $event->getProduct();
            $action->updateAttributes([$productId], array('watch_color' => $config_color) , 0);
        }
    }
}


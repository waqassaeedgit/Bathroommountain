<?php
 
namespace Vendor\Extension\Model\ResourceModel\Product;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('Vendor\Extension\Model\Product','Vendor\Extension\Model\ResourceModel\Product');
 
    }
 
}
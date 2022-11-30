<?php
 
namespace Vendor\Extension\Model\ResourceModel\Custom;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('Vendor\Extension\Model\Custom','Vendor\Extension\Model\ResourceModel\Custom');
 
    }
 
}
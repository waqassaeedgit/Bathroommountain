<?php
 
namespace Vendor\Extension\Model\ResourceModel\Cron;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('Vendor\Extension\Model\Cron','Vendor\Extension\Model\ResourceModel\Cron');
 
    }
 
}
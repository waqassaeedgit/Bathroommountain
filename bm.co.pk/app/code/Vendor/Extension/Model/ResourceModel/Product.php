<?php
 
namespace Vendor\Extension\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
class Product extends AbstractDb
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('backup_cron', 'id');
 
    }
 
}
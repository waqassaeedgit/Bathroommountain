<?php
 
namespace Vendor\Extension\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
class Cron extends AbstractDb
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('cron_cron', 'id');
 
    }
 
}
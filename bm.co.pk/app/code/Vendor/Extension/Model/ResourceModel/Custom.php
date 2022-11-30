<?php
 
namespace Vendor\Extension\Model\ResourceModel;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
class Custom extends AbstractDb
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('magecomp_customtable', 'id');
 
    }
 
}
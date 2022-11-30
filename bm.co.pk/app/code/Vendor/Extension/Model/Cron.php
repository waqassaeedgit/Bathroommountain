<?php
 
namespace Vendor\Extension\Model;
 
use Magento\Framework\Model\AbstractModel;
 
class Cron extends AbstractModel  {
 
const CACHE_TAG = 'id';
 
    protected function _construct()
 
{
 
        $this->_init('Vendor\Extension\Model\ResourceModel\Cron');
 
  }
 
public function getIdentities()
 
    {
 
        return [self::CACHE_TAG . '_' . $this->getId()];
 
    }
 
}
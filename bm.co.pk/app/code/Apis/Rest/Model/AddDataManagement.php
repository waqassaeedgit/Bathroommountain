<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Model;
use Magento\Framework\Webapi\Rest\Request;
use Apis\Rest\Api\AddDataManagementInterface;

class AddDataManagement implements AddDataManagementInterface
{
    protected $_productCollectionFactory;
    protected $resultJsonFactory;
    public function __construct(
        \Magento\Framework\App\ResourceConnection $resource,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        Request $request,   
    
        array $data = []
    ) {    
          
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->resourceCon = $resource->getConnection(); 
        $this->request = $request; 
        $this->resultJsonFactory = $resultJsonFactory;
    }
  
    public function addProducts($name)
    {
        $collection = $this->_productCollectionFactory->create();
        $products = $collection->addAttributeToSelect('*')->addAttributeToFilter('name', array('eq' => $name));
        return $products;
    }
    public function addData($name)
    {
        $products = $this->addProducts($name);
        foreach ($products as $product) {
            $name = $product['name'] .' Best_seller! ';
            $product->setName($name);
            echo $product['name'];
            $saveData = $product->save();     


      }
    }
}

<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Apis\Rest\Model;

use Magento\Framework\Webapi\Rest\Request;


class GetDataManagement implements \Apis\Rest\Api\GetDataManagementInterface
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
    
    public function getProducts($sku)
    {
        $collection = $this->_productCollectionFactory->create();
        $products = $collection->addAttributeToSelect('*')->addAttributeToFilter('sku', array('eq' => $sku));
        return $products;
    }
    public function getData($sku)
    {
        $products = $this->getProducts($sku);
        foreach ($products as $product) {
            echo json_encode($product->getData());
          }
    }
}
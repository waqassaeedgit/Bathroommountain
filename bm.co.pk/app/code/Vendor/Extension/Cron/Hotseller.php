<?php

namespace Vendor\Extension\Cron;

class Hotseller extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
    protected $productRepository;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\ResourceConnection $resource, 
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    ) {
        parent::__construct($context);
        $this->resourceCon = $resource->getConnection();
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->productRepository = $productRepository;
    }
    public function getProductCollectionByCategories()
    {
        $categories = [6]; //category ids array
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->addCategoriesFilter(["in" => $categories]);
        return $collection;
    }
    public function execute()
    {
       // $col=$this->_productCollectionFactory->create();
        $productCollection = $this->getProductCollectionByCategories();
        foreach ($productCollection as $product) 
        {
            $name = $product['name'] .' - Hot seller! ' ;
            $product->setName($name);
            echo $product['name'].$product['sku']."<br>";
            $saveData = $product->save();        
        }
        
    }
}




































 
            //  $product->setData("name", $name);
           //$product->save($product);
           //  $this->productRepository->save($product);
           //$query = "INSERT INTO 'product'(`name`) VALUES ('$name')";
           //$this->resourceCon->query($query);
               
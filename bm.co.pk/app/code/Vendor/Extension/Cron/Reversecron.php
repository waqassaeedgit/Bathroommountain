<?php

namespace Vendor\Extension\Cron;

class Reversecron extends \Magento\Framework\App\Helper\AbstractHelper
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

        $productCollection = $this->getProductCollectionByCategories();
        foreach ($productCollection as $product) {
            $name=str_replace(" - Hot seller! ","",$product["name"]);
            $product->setName($name);
            echo $product['name'].$product['sku']."<br>";
            $saveData = $product->save();        
        }
        
    }
}
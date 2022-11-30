<?php
namespace Vendor\Extension\Cron;
use Exception;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Backupcron extends \Magento\Framework\App\Helper\AbstractHelper
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
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Vendor\Extension\Model\CronFactory $cron,
         array $data = []
         )
    {

        parent::__construct($context);
        $this->resourceCon = $resource->getConnection();
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->productRepository = $productRepository;
        $this->_cron = $cron;
    }
    public function getProductCollectionByCategories()
    {
        $categories = [6, 11, 12, 14]; //category ids array
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->addCategoriesFilter(["in" => $categories]);
        return $collection;
    }
    public function getCollection()
    {

        return $this->_cron->create()->getCollection();

    }
    public function execute()
    {
        $x=0;
        $productCollection = $this->getProductCollectionByCategories();
        $model = $this->_cron->create();
        $getdata = $this->getCollection()->getData();
        foreach ($productCollection as $product) {
            
            $result=$product;
            foreach($getdata as $value)  {
                $result1 = $value; 
                if ($result["sku"] == $result1["sku"]) {
                    $x++;
                }
            }
            
            if ($x == 0) {
        
             $model->setData([
                
                         "name" => $product['name'],
                         "sku" => $product['sku']
                     ]);
             $saveData = $model->save();                       
           }
        }
    } 
}
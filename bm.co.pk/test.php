<?php
error_reporting(1);
ini_set('max_execution_time', 0);
use \Magento\Framework\App\Bootstrap;

require __DIR__ . '/app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$obj = $bootstrap->getObjectManager();
$instance = \Magento\Framework\App\ObjectManager::getInstance();
$resource = $objectManager->get("Magento\Framework\App\ResourceConnection");
$setup = $objectManager->create("Magento\Framework\Setup\ModuleDataSetupInterface");
$connection = $resource->getConnection();

//adding table 
$installer = $setup;
$installer->startSetup();
$table = $installer
    ->getConnection()
    ->newTable($installer->getTable("test_prices")) 
    ->addColumn(                                          
        "id",
        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
        11,
        [
            "identity" => true,
            "unsigned" => true,
            "nullable" => false,
            "primary" => true,
        ],
        "Autoincremental ID"
    )

    ->addColumn(                                       
        "price",
        \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
        255,
        ["nullable" => true],
        "Price"
    )

    ->addColumn(
        "sku",
        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
        "255",
        ["nullable" => false],
        "SKU"
    );
$installer->getConnection()->createTable($table);
$installer->endSetup();
$result1 = $connection->fetchAll("SELECT * FROM test_prices");
$product_collections = $obj->create("Magento\Catalog\Model\ResourceModel\Product\CollectionFactory");
$collections = $product_collections->create()->addAttributeToSelect("*")->load();
$test = $product_collections->create();
foreach ($collections as $product) {
    $x=0;
    $test = $product->getData();
    foreach($result1 as $value){
        $test1=$value;
        if($test["sku"]==$test1["sku"]){
            $x++;
        }
    }
        if($x==0){
        $query = "INSERT INTO `test_prices`( `price`, `sku`) VALUES ('$test[price]', '$test[sku]')";
        $connection->query($query);
        }

    }  

echo "Script run Successfully";
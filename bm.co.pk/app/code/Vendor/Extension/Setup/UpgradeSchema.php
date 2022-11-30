
<?php
// namespace Vendor\Extension\Setup;

// use Magento\Framework\Setup\UpgradeSchemaInterface;
// use Magento\Framework\Setup\ModuleContextInterface;
// use Magento\Framework\Setup\SchemaSetupInterface;

// class UpgradeSchema implements UpgradeSchemaInterface
// {

//     /**
//      * {@inheritdoc}
//      */
//     public function upgrade(
//         SchemaSetupInterface $setup,
//         ModuleContextInterface $context
//     ) {
//         $installer = $setup;

//         $installer->startSetup();
//         if (version_compare($context->getVersion(), "1.0.0", "<")) {
//         //Your upgrade script
        
//         }
        
//         if (version_compare($context->getVersion(), '1.0.1', '<')) {
//           $installer->getConnection()->addColumn(
//                 $installer->getTable('magecomp_customtable'),
//                 'auther',
//                 [
//                     'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                     'length' => 255,
//                     'nullable' => false,
//                     'comment' => 'Author',
//                     'Author'
//                 ],
//                 'short_decp',
//                 [
//                     'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                     'length' => 255,
//                     'nullable' => false,
//                     'comment' => 'Short Description',
//                     'Short Description'
//                 ],
//                 'actions',
//                 [
//                     'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                     'length' => 255,
//                     'nullable' => false,
//                     'comment' => 'Actions',
//                     'Actions'
//                 ]

                    

//             );
//         }
//         $installer->endSetup();
//     }
// }
<?php
namespace Webramos\Checkoutsize\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'checkout_size',
            [
                'type' => 'datetime',
                'nullable' => true,
                'comment' => 'Size',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'checkout_size',
            [
                'type' => 'datetime',
                'nullable' => true,
                'comment' => 'Size',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            'checkout_size',
            [
                'type' => 'datetime',
                'nullable' => true,
                'comment' => 'Size',
            ]
        );

        $setup->endSetup();
    }
}
<?php

namespace TrackingMore\Detrack\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\ObjectManager;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     * @codingStandardsIgnoreStart
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        /*
         * Contact table.
         */
        if ($installer->getConnection()->isTableExists(
            $installer->getTable('email_contact')
        )
        ) {
            $installer->getConnection()->dropTable(
                $installer->getTable('email_contact')
            );
        }

        $contactTable = $installer->getConnection()->newTable(
            $installer->getTable('email_contact')
        )
            ->addColumn(
                'email_contact_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null,
                [
                    'primary' => true,
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false
                ], 'Primary Key'
            )
            ->addColumn(
                'is_guest', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null, ['unsigned' => true, 'nullable' => true], 'Is Guest'
            )
            ->addColumn(
                'contact_id', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 15,
                ['unsigned' => true, 'nullable' => true], 'Connector Contact ID'
            )
            ->addColumn(
                'customer_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11, ['unsigned' => true, 'nullable' => false], 'Customer ID'
            )
            ->addColumn(
                'website_id', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, 5,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Website ID'
            )
            ->addColumn(
                'store_id', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, 5,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Store ID'
            )
            ->addColumn(
                'email', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255,
                ['nullable' => false, 'default' => ''], 'Customer Email'
            )
            ->addColumn(
                'is_subscriber', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null, ['unsigned' => true, 'nullable' => true], 'Is Subscriber'
            )
            ->addColumn(
                'subscriber_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, null,
                ['unsigned' => true, 'nullable' => true], 'Subscriber status'
            )
            ->addColumn(
                'email_imported',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, null,
                ['unsigned' => true, 'nullable' => true], 'Is Imported'
            )
            ->addColumn(
                'subscriber_imported',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, null,
                ['unsigned' => true, 'nullable' => true], 'Subscriber Imported'
            )
            ->addColumn(
                'suppressed', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null, ['unsigned' => true, 'nullable' => true], 'Is Suppressed'
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['email_contact_id']),
                ['email_contact_id']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['is_guest']),
                ['is_guest']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['customer_id']),
                ['customer_id']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['website_id']),
                ['website_id']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['is_subscriber']),
                ['is_subscriber']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['subscriber_status']),
                ['subscriber_status']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['email_imported']),
                ['email_imported']
            )
            ->addIndex(
                $installer->getIdxName(
                    'email_contact', ['subscriber_imported']
                ), ['subscriber_imported']
            )
            ->addIndex(
                $installer->getIdxName('email_contact', ['suppressed']),
                ['suppressed']
            )
            ->addForeignKey(
                $installer->getFkName(
                    'email_contact', 'website_id', 'store_website', 'website_id'
                ),
                'website_id',
                $installer->getTable('store_website'),
                'website_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Connector Contacts');
        //create table
        $installer->getConnection()->createTable($contactTable);
        $installer->endSetup();
        // @codingStandardsIgnoreEnd
    }
}

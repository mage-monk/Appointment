<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'deloitte_appointment'
         */     
        if (!$installer->tableExists('deloitte_appointment')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('deloitte_appointment')
                )->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'identity' => true, 'nullable' => false, 'primary' => true],
                    'Appointment Id'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Email'
                )
                ->addColumn(
                    'contact_number',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Contact Number'
                ) 
                ->addColumn(
                    'address',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable' => false],
                    'Address'
                )
                ->addColumn(
                    'state',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'State'
                ) 
                ->addColumn(
                    'city',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'City'
                )
                ->addColumn(
                    'country',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Country'
                )    
                ->addColumn(
                    'mode_of_appointment',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Mode of Appointment'
                )
                ->addColumn(
                    'mode_of_communication',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Mode of Communication'
                )
                ->addColumn(
                    'store_id',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Store ID'
                )
                ->addColumn(
                    'appointment_datetime',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Appointment Datetime'
                )
                ->addColumn(
                    'preferred_langugage',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Preferred Langugage'
                )
                ->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => true],
                    'Customer ID'
                )
                ->addColumn(
                    'status',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Status'
                )
                ->addColumn(
                    'comment',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable' => false],
                    'Comment'
                )          
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Creation Time'
                )
                ->addColumn(
                    'updated_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                    'Update Time'
                ) 
                ->setComment(
                    'Appointment details'
                );
            $installer->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
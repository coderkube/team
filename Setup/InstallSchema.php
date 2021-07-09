<?php

/**
 * CoderkubeTeam
 * Copyright(C) 06/2020 CoderkubeTeam <support@coderkube.com>
 * @package Coderkube_Team
 * @copyright Copyright(C) 06/2020 CoderkubeTeam (https://coderkube.com/)
 * @author CoderkubeTeam <support@coderkube.com>
 */
namespace Coderkube\Team\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        
        //START MEMBER TABLE
        $member_table = $setup->getConnection()->newTable($setup->getTable('coderkube_team_member'));
        $member_table->addColumn(
            'member_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary'  => true,
                'unsigned' => true,
            ],
            'Member ID'
        );
        $member_table->addColumn(
            'member_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Member Name'
        );
        $member_table->addColumn(
            'designation',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Designation'
        );
        $member_table->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true,'default' => null],
            'Image'
        );
        $member_table->addColumn(
            'email_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Email Id'
        );
        $member_table->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            ['nullable' => true,'default' => null],
            'Content'
        );
        $member_table->addColumn(
            'fb_link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Facebook Link'
        );
        $member_table->addColumn(
            'google_link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Google Link'
        );
        $member_table->addColumn(
            'twitter_link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Twitter Link'
        );
        $member_table->addColumn(
            'sortorder',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'sortorder'
        );
        $member_table->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            1,
            [],
            'Team Status'
        );
        $member_table->addColumn(
            'category_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Category Name'
        );
        $member_table->addColumn(
            'created_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Created Date'
        );
        //END MEMBER TABLE

        //START CATEGORY TABLE
        $category_table = $setup->getConnection()->newTable($setup->getTable('coderkube_categories'));
        $category_table->addColumn(
            'cat_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                   'identity' => true,
                   'nullable' => false,
                   'primary' => true,
                   'unsigned' => true,
               ],
            'Category ID'
        );
   
           $category_table->addColumn(
               'category_name',
               \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
               null,
               [],
               'Category Name'
           );

           $category_table->addColumn(
               'status',
               \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
               1,
               [],
               'Category Status'
           );
           $category_table->addColumn(
               'sortorder',
               \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
               null,
               [],
               'Sortorder'
           );
        //END CATEGORY TABLE
        
        $setup->getConnection()->createTable($member_table);
        $setup->getConnection()->createTable($category_table);
        $setup->endSetup();
    }
}

<?php
/**
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @category    Magemaven
 * @package     Magemaven_OrderComment
 * @copyright   Copyright (c) 2011-2012 Sergey Storchay <r8@r8.com.ua>
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
class Magemaven_OrderComment_Model_Resource_Order_Grid_Collection extends Mage_Sales_Model_Mysql4_Order_Grid_Collection
{
    /**
     * Init collection select
     *
     * @return Mage_Core_Model_Resource_Db_Collection_Abstract
     */
    protected function _initSelect()
    {
        parent::_initSelect();

        // Join order comment
        $this->getSelect()->joinLeft(
            array('ordercomment_table' => $this->getTable('sales/order_status_history')),
            'main_table.entity_id = ordercomment_table.parent_id AND ordercomment_table.comment IS NOT NULL',
            array(
                'ordercomment' => 'ordercomment_table.comment',
            )
        )->group('main_table.entity_id');

        return $this;
    }

    /**
     * Init collection count select
     *
     * @return Varien_Db_Select
     */
    public function getSelectCountSql()
    {
        return parent::getSelectCountSql()->reset(Zend_Db_Select::GROUP);
    }
}

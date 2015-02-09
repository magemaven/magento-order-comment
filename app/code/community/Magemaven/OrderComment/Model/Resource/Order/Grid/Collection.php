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
    protected function _afterLoad()
    {
        parent::_afterLoad();
        if (count($this->_items) > 0) {
            $ids = array();

            foreach ($this->_items as $item) {
                $ids[] = $item->getId();
            }
            $ids = implode(',', $ids);

            $select = $this->getConnection()
                ->select()
                ->from($this->getTable('sales/order_status_history'))
                ->where("parent_id IN ($ids)")
                ->order('created_at ASC');

            $items = $this->getConnection()->fetchAll($select);

            foreach($items as $item) {
                $parent = $this->_items[$item['parent_id']];
                $parent->setOrdercomment($item['comment']);
            }
        }

        return $this;
    }
}

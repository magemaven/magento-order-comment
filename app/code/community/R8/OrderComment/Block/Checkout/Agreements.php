<?php
class R8_OrderComment_Block_Checkout_Agreements extends Mage_Checkout_Block_Agreements
{
    /**
     * Override block template
     *
     * @return string
     */
    protected function _toHtml()
    {
        $this->setTemplate('ordercomment/checkout/agreements.phtml');
        return parent::_toHtml();
    }
}
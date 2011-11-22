<?php

class R8_OrderComment_Block_Checkout_Onepage_Review_Info extends Mage_Checkout_Block_Onepage_Review_Info
{
    /**
     * Render block to Html
     *
     * @return string
     */
    protected function _toHtml()
    {

        $html = parent::_toHtml();
        $html .= $this->getChildHtml('ordercomment_js');
        return $html;
    }

}
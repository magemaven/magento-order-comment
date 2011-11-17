<?php

/** @var $installer Mage_Sales_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$installer->addAttribute('order', 'customer_comment', array(
    'type'            => 'text',
    'frontend_input'  => 'textarea',
    'is_global'       => true,
    'is_visible'      => true,
    'is_required'     => false,
    'is_user_defined' => true,
    'label'           => 'Order Comment',
));

$installer->endSetup();
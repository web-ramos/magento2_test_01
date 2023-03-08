<?php

namespace Webramos\CheckoutSize\Block;

class LayoutProcessor implements \Magento\Checkout\Block\Checkout\LayoutProcessorInterface
{
    public function process($jsLayout)
    {
        $attributeCode = 'checkout_size';
        $fieldConfiguration = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.extension_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input'
            ],
            'dataScope' => 'shippingAddress.extension_attributes' . '.' . $attributeCode,
            'label' => 'Size',
            'provider' => 'checkoutProvider',
            'sortOrder' => 1000,
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => '0'
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']
        ['children'][$attributeCode] = $fieldConfiguration;
        return $jsLayout;
    }
}

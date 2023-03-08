<?php

namespace Webramos\CheckoutSize\Plugin;

use Magento\Quote\Api\CartRepositoryInterface;

class ShippingInformationManagement
{
    public $cartRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository
    ) {
        $this->cartRepository = $cartRepository;
    }

    public function beforeSaveAddressInformation($subject, $cartId, $addressInformation)
    {
        $quote = $this->cartRepository->getActive($cartId);
        $checkoutSize = $addressInformation->getShippingAddress()->getExtensionAttributes()->getCheckoutSize();
        $quote->setCheckoutSize($checkoutSize);
        $this->cartRepository->save($quote);
        return [$cartId, $addressInformation];
    }
}
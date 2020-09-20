<?php

namespace App\Service;

use App\Model\Campaign;
use App\Model\Coupon;
use App\ShoppingCard\ShoppingCard;

class ShoppingService
{
    /**
     * @param ShoppingCard $shoppingCard
     * @param Campaign $campaign
     */
    public function applyCampaign(ShoppingCard $shoppingCard, Campaign $campaign): void
    {
        foreach ($shoppingCard->getItems() as $item) {
            if ($item->getProduct()->getCategory()->getTitle() === $campaign->getCategory()->getTitle()) {
                $item->setDiscount($campaign->getDiscountAmount());
            }
        }
    }

    /**
     * @param ShoppingCard $shoppingCart
     * @param Coupon $coupon
     */
    public function applyCoupon(ShoppingCard $shoppingCart, Coupon $coupon): void
    {
        if ($shoppingCart->getSubTotalPrice() >= $coupon->getMinimumAmount() &&
            ($shoppingCart->getSubTotalPrice() - $coupon->getDiscountAmount()) > 0
        ){
            $shoppingCart->setTotalPrice($shoppingCart->getSubTotalPrice() - $coupon->getDiscountAmount());
        }
    }
}

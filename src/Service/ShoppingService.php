<?php

namespace App\Service;

use App\Model\Campaign;
use App\Model\Coupon;
use App\ShoppingCard\ShoppingCard;

class ShoppingService
{
    /**
     * @param ShoppingCard $shoppingCard
     * @param Campaign[] $campaigns
     */
    public function applyCampaigns(ShoppingCard $shoppingCard, array $campaigns): void
    {
        foreach ($shoppingCard->getItems() as $item) {
            foreach ($campaigns as $campaign){
                if ($campaign instanceof Campaign){
                    if ($item->getProduct()->getCategory()->getTitle() === $campaign->getCategory()->getTitle()) {
                        $item->setDiscount($campaign->getDiscountAmount());
                    }
                }
            }
        }
    }

    /**
     * @param ShoppingCard $shoppingCard
     * @param Coupon $coupon
     */
    public function applyCoupon(ShoppingCard $shoppingCard, Coupon $coupon): void
    {
        if ($shoppingCard->getSubTotalPrice() >= $coupon->getMinimumAmount() &&
            ($shoppingCard->getSubTotalPrice() - $coupon->getDiscountAmount()) > 0
        ){
            $shoppingCard->setTotalPrice($shoppingCard->getSubTotalPrice() - $coupon->getDiscountAmount());
        }
    }
}

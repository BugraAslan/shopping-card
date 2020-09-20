<?php

namespace App\Model;

class Coupon extends AbstractDiscount
{
    /** @var float */
    protected $minimumAmount;

    /**
     * @return float
     */
    public function getMinimumAmount(): float
    {
        return $this->minimumAmount;
    }

    /**
     * @param float $minimumAmount
     * @return Coupon
     */
    public function setMinimumAmount(float $minimumAmount): Coupon
    {
        $this->minimumAmount = $minimumAmount;
        return $this;
    }
}
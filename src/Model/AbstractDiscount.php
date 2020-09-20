<?php

namespace App\Model;

abstract class AbstractDiscount
{
    /** @var float */
    protected $discountAmount;

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    /**
     * @param float $discountAmount
     * @return AbstractDiscount
     */
    public function setDiscountAmount(float $discountAmount): AbstractDiscount
    {
        $this->discountAmount = $discountAmount;
        return $this;
    }
}
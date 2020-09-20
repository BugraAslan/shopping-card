<?php

namespace App\Model;

class Delivery
{
    /** @var float */
    protected $costPerProduct;

    /** @var float */
    protected $costPerDelivery;

    /** @var float */
    protected $defaultCost = 9.99;

    /**
     * @return float
     */
    public function getCostPerProduct(): float
    {
        return $this->costPerProduct;
    }

    /**
     * @param float $costPerProduct
     * @return Delivery
     */
    public function setCostPerProduct(float $costPerProduct): Delivery
    {
        $this->costPerProduct = $costPerProduct;
        return $this;
    }

    /**
     * @return float
     */
    public function getCostPerDelivery(): float
    {
        return $this->costPerDelivery;
    }

    /**
     * @param float $costPerDelivery
     * @return Delivery
     */
    public function setCostPerDelivery(float $costPerDelivery): Delivery
    {
        $this->costPerDelivery = $costPerDelivery;
        return $this;
    }

    /**
     * @return float
     */
    public function getDefaultCost(): float
    {
        return $this->defaultCost;
    }

    /**
     * @param float $defaultCost
     * @return Delivery
     */
    public function setDefaultCost(float $defaultCost): Delivery
    {
        $this->defaultCost = $defaultCost;
        return $this;
    }
}
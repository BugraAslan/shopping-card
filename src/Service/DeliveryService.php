<?php

namespace App\Service;

use App\Model\Delivery;

class DeliveryService
{
    /** @var Delivery */
    protected $deliveryModel;

    /**
     * DeliveryService constructor.
     * @param Delivery $deliveryModel
     */
    public function __construct(Delivery $deliveryModel)
    {
        $this->deliveryModel = $deliveryModel;
    }

    /**
     * @param int $deliveryCount
     * @param int $productCount
     * @return float
     */
    public function deliveryCostCalculator(int $deliveryCount, int $productCount)
    {
        if (!$deliveryCount || !$productCount){
            return $this->deliveryModel->getDefaultCost();
        }

        return ($this->deliveryModel->getCostPerDelivery() * $deliveryCount) +
            ($this->deliveryModel->getCostPerProduct() * $productCount);
    }
}
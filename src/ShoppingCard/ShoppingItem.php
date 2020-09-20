<?php

namespace App\ShoppingCard;

use App\Model\Product;

class ShoppingItem
{
    /** @var Product */
    protected $product;

    /** @var int */
    protected $quantity = 0;

    /** @var float */
    protected $discount = 0;

    /**
     * ShoppingItem constructor.
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return ShoppingItem
     */
    public function setQuantity(int $quantity): ShoppingItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return ShoppingItem
     */
    public function setProduct(Product $product): ShoppingItem
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return ShoppingItem
     */
    public function setDiscount(float $discount): ShoppingItem
    {
        $this->discount = $discount;
        return $this;
    }
}

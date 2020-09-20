<?php

namespace App\ShoppingCard;

class ShoppingCard
{
    /** @var ShoppingItem[] */
    protected $items;

    /** @var float */
    protected $totalPrice = 0;

    /**
     * @return ShoppingItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ShoppingItem[] $items
     * @return ShoppingCard
     */
    public function setItems(array $items): ShoppingCard
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     * @return ShoppingCard
     */
    public function setTotalPrice(float $totalPrice): ShoppingCard
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    /**
     * @param ShoppingItem $item
     * @return $this
     */
    public function addItem(ShoppingItem $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemCount()
    {
        $quantity = 0;
        foreach ($this->items as $item) {
            $quantity += $item->getQuantity();
        }

        return $quantity;
    }

    /**
     * @return float|int
     */
    public function getSubTotalPrice()
    {
        $subTotalPrice = 0;
        foreach ($this->items as $item) {
            $subTotalPrice += $item->getQuantity() * ($item->getProduct()->getPrice() - $item->getDiscount());
        }

        return $subTotalPrice;
    }

    /**
     * @return int
     */
    public function getDeliveryCount()
    {
        $categories = [];
        foreach ($this->items as $item){
            if (!in_array($item->getProduct()->getCategory()->getTitle(), $categories)){
                $categories[] = $item->getProduct()->getCategory()->getTitle();
            }
        }

        return count($categories);
    }
}

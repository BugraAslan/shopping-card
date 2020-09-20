<?php

namespace App\Model;

class Campaign extends AbstractDiscount
{
    /** @var Category */
    protected $category;

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Campaign
     */
    public function setCategory(Category $category): Campaign
    {
        $this->category = $category;
        return $this;
    }
}
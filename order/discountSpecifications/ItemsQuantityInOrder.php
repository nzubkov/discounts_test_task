<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:10
 */

namespace order\discountSpecifications;


class ItemsQuantityInOrder extends CompositeSpecification
{
    public $itemsCount;

    public function __construct($itemsCount)
    {
        $this->itemsCount = $itemsCount;
    }

    public function isSatisfiedBy($order)
    {
        return $order->getItemsQuantity() === $this->itemsCount;
    }
}
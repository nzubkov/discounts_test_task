<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:48
 */

namespace order\discounts;


use order\discountSpecifications\ItemsQuantityInOrder;
use order\Order;

class ThreeItemsDiscount extends OrderDiscount
{
    protected const RATE = 5;
    private const ITEMS_COUNT = 3;

    public static function apply(Order $order)
    {
        $orderHasThreeItems = new ItemsQuantityInOrder(self::ITEMS_COUNT);
        $discountAllowed = $orderHasThreeItems->isSatisfiedBy($order);
        if ($discountAllowed) {
            self::discount($order);
        }
    }
}
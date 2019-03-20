<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:49
 */

namespace order\discounts;


use order\discountSpecifications\ItemsQuantityInOrder;
use order\Order;

class FiveItemsDiscount extends OrderDiscount
{
    protected const RATE = 20;
    private const ITEMS_COUNT = 5;

    public static function apply(Order $order)
    {
        $orderHasThreeItems = new ItemsQuantityInOrder(self::ITEMS_COUNT);
        $discountAllowed = $orderHasThreeItems->isSatisfiedBy($order);
        if ($discountAllowed) {
            self::discount($order);
        }
    }
}
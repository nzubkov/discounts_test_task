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

class FourItemsDiscount extends OrderDiscount
{
    protected const RATE = 10;
    private const ITEMS_COUNT = 4;

    public static function apply(Order $order)
    {
        $orderHasThreeItems = new ItemsQuantityInOrder(self::ITEMS_COUNT);
        $discountAllowed = $orderHasThreeItems->isSatisfiedBy($order);
        if ($discountAllowed) {
            self::discount($order);
        }
    }
}
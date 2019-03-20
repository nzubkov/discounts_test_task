<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:48
 */

namespace order\discounts;


use order\discountSpecifications\ItemHasTypeOf;
use order\Order;

abstract class OrderDiscount implements Discount
{
    protected const RATE = 0;

    protected static function discount(Order $order)
    {
        $itemPositions = $order->getItemPositions();
        $itemHasTypeA = new ItemHasTypeOf('products\A');
        $itemHasTypeC = new ItemHasTypeOf('products\C');

        foreach ($itemPositions as $itemPosition) {
            $items = $itemPosition->getItems();
            foreach ($items as $item) {
                $discountNotAllowed = $item->wasDiscounted() || $itemHasTypeA->or($itemHasTypeC)->isSatisfiedBy($item);
                if ($discountNotAllowed) {
                    continue;
                }
                $item->reduceCost(static::RATE);
            }
        }
        return $itemPositions;
    }
}
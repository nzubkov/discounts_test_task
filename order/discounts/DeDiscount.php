<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 3:53
 */

namespace order\discounts;


use order\discountSpecifications\OrderHasItemTypeOf;
use order\Order;

class DeDiscount extends ItemsDiscount
{
    protected const RATE = 6;
    private static $itemType1 = 'products\D';
    private static $itemType2 = 'products\E';

    public static function apply(Order $order)
    {
        $items = $order->getItemPositions();
        $itemHasTypeA = new OrderHasItemTypeOf(self::$itemType1);
        $itemHasTypeB = new OrderHasItemTypeOf(self::$itemType2);
        $discountAllowed = $itemHasTypeA->and($itemHasTypeB)->isSatisfiedBy($items);
        if($discountAllowed){
            $limit = self::getDiscountLimit(
                $items[self::$itemType1]->getItemQuantity(),
                $items[self::$itemType2]->getItemQuantity()
            );

            self::discount($items[self::$itemType1], $limit);
            self::discount($items[self::$itemType2], $limit);
        }
        $order->setItems($items);
    }
}
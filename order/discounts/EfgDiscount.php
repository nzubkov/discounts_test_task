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

class EfgDiscount extends ItemsDiscount
{
    protected const RATE = 3;
    private static $itemType1 = 'products\E';
    private static $itemType2 = 'products\F';
    private static $itemType3 = 'products\G';

    public static function apply(Order $order)
    {
        $items = $order->getItemPositions();
        $itemHasTypeE = new OrderHasItemTypeOf(self::$itemType1);
        $itemHasTypeF = new OrderHasItemTypeOf(self::$itemType2);
        $itemHasTypeG = new OrderHasItemTypeOf(self::$itemType3);
        $discountAllowed = $itemHasTypeE->and($itemHasTypeF)->and($itemHasTypeG)->isSatisfiedBy($items);
        if ($discountAllowed) {
            $limit = self::getDiscountLimit(
                $items[self::$itemType1]->getItemQuantity(),
                $items[self::$itemType2]->getItemQuantity(),
                $items[self::$itemType3]->getItemQuantity()
            );

            self::discount($items[self::$itemType1], $limit);
            self::discount($items[self::$itemType2], $limit);
            self::discount($items[self::$itemType3], $limit);
        }
        $order->setItems($items);
    }
}
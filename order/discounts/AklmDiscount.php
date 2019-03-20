<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 6:48
 */

namespace order\discounts;


use order\discountSpecifications\OrderHasItemTypeOf;
use order\Order;

class AklmDiscount extends ItemsDiscount
{
    protected const RATE = 5;
    private static $itemType1 = 'products\A';
    private static $itemType2 = 'products\K';
    private static $itemType3 = 'products\L';
    private static $itemType4 = 'products\M';

    public static function apply(Order $order)
    {
        $items = $order->getItemPositions();
        $itemHasTypeA = new OrderHasItemTypeOf(self::$itemType1);
        $itemHasTypeK = new OrderHasItemTypeOf(self::$itemType2);
        $itemHasTypeL = new OrderHasItemTypeOf(self::$itemType3);
        $itemHasTypeM = new OrderHasItemTypeOf(self::$itemType4);
        $discountAllowed = $itemHasTypeA->and($itemHasTypeK->or($itemHasTypeL->or($itemHasTypeM)))->isSatisfiedBy($items);
        if ($discountAllowed) {
            if(!empty($items[self::$itemType2])){
                $limit = $items[self::$itemType2]->getItemQuantity();
                self::discount($items[self::$itemType2], $limit);
            }
            if(!empty($items[self::$itemType3])){
                $limit = $items[self::$itemType3]->getItemQuantity();
                self::discount($items[self::$itemType3], $limit);
            }
            if(!empty($items[self::$itemType4])) {
                $limit = $items[self::$itemType4]->getItemQuantity();
                self::discount($items[self::$itemType4], $limit);
            }
        }
        $order->setItems($items);
    }
}
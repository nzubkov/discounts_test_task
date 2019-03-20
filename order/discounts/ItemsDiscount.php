<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 0:02
 */

namespace order\discounts;


use order\ItemPosition;

abstract class ItemsDiscount implements Discount
{
    protected const RATE = 0;

    protected static function discount(ItemPosition $items, $limit = 0)
    {
        $items = $items->getItems();
        if (empty($limit)) {
            $limit = count($items);
        }
        for ($i = 0; $i < $limit; $i++) {
            if ($items[$i]->wasDiscounted()) {
                continue;
            }
            $items[$i]->reduceCost(static::RATE);
        }
        return $items;
    }

    protected static function getDiscountLimit(...$itemCounts)
    {
        $result = array_shift($itemCounts);
        for ($i = 0, $c = count($itemCounts); $i < $c; $i++) {
            if ($itemCounts[$i] < $result) {
                $result = $itemCounts[$i];
            }
        }
        return $result;
    }
}
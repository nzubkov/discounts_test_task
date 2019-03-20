<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 23:23
 */

namespace order;

use order\discounts\AbDiscount;
use order\discounts\AklmDiscount;
use order\discounts\DeDiscount;
use order\discounts\EfgDiscount;
use order\discounts\ThreeItemsDiscount;
use order\discounts\FourItemsDiscount;
use order\discounts\FiveItemsDiscount;

class OrderCost
{
    public static function calculate(Order $order)
    {
        AbDiscount::apply($order);
        DeDiscount::apply($order);
        EfgDiscount::apply($order);
        AklmDiscount::apply($order);
        ThreeItemsDiscount::apply($order);
        FourItemsDiscount::apply($order);
        FiveItemsDiscount::apply($order);
        return $order->getTotalCost();
    }
}
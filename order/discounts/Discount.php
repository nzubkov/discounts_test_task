<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:53
 */

namespace order\discounts;


use order\Order;

interface Discount
{
    public static function apply(Order $order);
}
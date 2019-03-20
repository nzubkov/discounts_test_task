<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 22:06
 */

require_once 'autoloader.php';

use \order\Order;
use \order\OrderCost;
use \products\ProductFactory;

//тест скидки на 10% (AB)
$order = new Order();
$products = ProductFactory::createSet(['A', 'B']);
foreach ($products as $product) {
    $order->addItem($product);
}
$abOrderCost = OrderCost::calculate($order);
echo $abOrderCost, '<br>';
unset($order);

//тест скидки на 6% (DE)
$order = new Order();
$products = ProductFactory::createSet(['D', 'E']);
foreach ($products as $product) {
    $order->addItem($product);
}
$deOrderCost = OrderCost::calculate($order);
echo $deOrderCost, '<br>';

//тест скидки на 3% (EFG)
$order = new Order();
$products = ProductFactory::createSet(['E', 'F', 'G']);
foreach ($products as $product) {
    $order->addItem($product);
}
$efgOrderCost = OrderCost::calculate($order);
echo $efgOrderCost, '<br>';

//тест скидки на 4 продукта (кроме А и C)
$order = new Order();
$products = ProductFactory::createSet(['A', 'B', 'D', 'F']);
foreach ($products as $product) {
    $order->addItem($product);
}
$fourItemsOrderCost = OrderCost::calculate($order);
echo $fourItemsOrderCost, '<br>';

//тест скидки на 5 продуктов (кроме А и C)
$order = new Order();
$products = ProductFactory::createSet(['A', 'C', 'B', 'D', 'F']);
foreach ($products as $product) {
    $order->addItem($product);
}
$fiveItemsOrderCost = OrderCost::calculate($order);
echo $fiveItemsOrderCost, '<br>';

//тест скидки на 16 продуктов (3 А, 2 B, 4 E, 3 F, 2 G, 1 K, 1 L, 1 M)
$order = new Order();
$products = ProductFactory::createSet([
    'A',
    'A',
    'A',
    'B',
    'E',
    'B',
    'E',
    'E',
    'E',
    'F',
    'G',
    'F',
    'G',
    'F',
    'K',
    'L',
    'M'
]);
foreach ($products as $product) {
    $order->addItem($product);
}
$mixedItemsOrderCost = OrderCost::calculate($order);
echo $mixedItemsOrderCost, '<br>';

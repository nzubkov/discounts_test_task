<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 22:06
 */

/**
 * Описание:
 *
 * Есть продукты A, B, C, D, E, F, G, H, I, J, K, L, M. Каждый продукт стоит определенную сумму.
 *
 * Есть набор правил расчета итоговой суммы:
 *
 * 1. Если одновременно выбраны А и B, то их суммарная стоимость уменьшается на 10% (для каждой пары А и B)
 *
 * 2. Если одновременно выбраны D и E, то их суммарная стоимость уменьшается на 6% (для каждой пары D и E)
 *
 * 3. Если одновременно выбраны E, F, G, то их суммарная стоимость уменьшается на 3% (для каждой тройки E, F, G)
 *
 * 4. Если одновременно выбраны А и один из [K, L, M], то стоимость выбранного продукта уменьшается на 5%
 *
 * 5. Если пользователь выбрал одновременно 3 продукта, он получает скидку 5% от суммы заказа
 *
 * 6. Если пользователь выбрал одновременно 4 продукта, он получает скидку 10% от суммы заказа
 *
 * 7. Если пользователь выбрал одновременно 5 продуктов, он получает скидку 20% от суммы заказа
 *
 * 8. Описанные скидки 5,6,7 не суммируются, применяется только одна из них
 *
 * 9. Продукты A и C не участвуют в скидках 5,6,7
 *
 * 10. Каждый товар может участвовать только в одной скидке. Скидки применяются последовательно в порядке описанном выше.
 *
 *
 *
 * Обязательные требования:
 *
 * Необходимо написать программу на PHP, которая, имея на входе набор продуктов
 * (один продукт может встречаться несколько раз) рассчитывала суммарную их стоимость.
 *
 * Программу необходимо написать максимально просто и максимально гибко.
 * Учесть, что список продуктов практически не будет меняться, также как и типы скидок.
 * В то время как правила скидок (какие типы скидок к каким продуктам) будут меняться регулярно.
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
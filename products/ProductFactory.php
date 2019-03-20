<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 23:17
 */

namespace products;


class ProductFactory
{
    public static function create($productName)
    {
        $className = "\\products\\{$productName}";
        if (class_exists($className)) {
            return new $className();
        }
    }

    public static function createSet($productNames)
    {
        $result = [];
        foreach ($productNames as $productName) {
            $result[] = self::create($productName);
        }
        return $result;
    }
}
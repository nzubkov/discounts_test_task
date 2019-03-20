<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 0:08
 */

namespace order;

class ItemPosition
{
    private $items;
    private $itemQuantity;

    public function add($item)
    {
        $this->items[] = $item;
        $this->itemQuantity++;
    }

    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    public function getItems()
    {
        return $this->items;
    }
}
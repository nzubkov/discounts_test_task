<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 23:00
 */

namespace order;

class Order
{
    private $itemPositions;

    public function setItems($items = [])
    {
        $this->itemPositions = !empty($items) ? $items : $this->itemPositions;
    }

    public function addItem($item)
    {
        //узнаем тип товара
        $itemType = (string)$item;
        //создаем позицию для товара
        if (empty($this->itemPositions[$itemType])) {
            $this->itemPositions[$itemType] = new ItemPosition();
        }
        //добавляем товар в позицию
        $this->itemPositions[$itemType]->add($item);

    }

    public function getItemsQuantity()
    {
        $result = 0;
        foreach ($this->itemPositions as $itemPosition) {
            $result += $itemPosition->getItemQuantity();
        }
        return $result;
    }

    public function getItemPositions()
    {
        return $this->itemPositions;
    }

    public function getTotalCost()
    {
        $result = 0;
        foreach ($this->itemPositions as $itemPosition) {
            $items = $itemPosition->getItems();
            foreach ($items as $item) {
                $result += $item->getCost();
            }
        }
        return $result;
    }
}
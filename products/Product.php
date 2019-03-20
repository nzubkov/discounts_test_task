<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 17.03.2019
 * Time: 22:20
 */

namespace products;


abstract class Product
{
    protected $price;
    protected $cost;
    protected $wasDiscounted = false;

    public function __construct()
    {
        $this->cost = $this->price;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function reduceCost($rate = 0)
    {
        if ($rate > 0) {
            $this->cost = $this->cost - ($this->price / 100 * $rate);
            $this->wasDiscounted = true;
        }
    }

    public function wasDiscounted()
    {
        return $this->wasDiscounted;
    }

    public function __toString()
    {
        return get_class($this);
    }

}
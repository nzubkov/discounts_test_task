<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 6:12
 */

namespace order\discountSpecifications;


class ItemHasTypeOf extends CompositeSpecification
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function isSatisfiedBy($item)
    {
        return (string)$item === $this->type;
    }
}
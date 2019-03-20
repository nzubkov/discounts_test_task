<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 4:57
 */

namespace order\discountSpecifications;


class OrderHasItemTypeOf extends CompositeSpecification
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function isSatisfiedBy($items)
    {
        return !empty($items[(string)$this->type]);
    }
}
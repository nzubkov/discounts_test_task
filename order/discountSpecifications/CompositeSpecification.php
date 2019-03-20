<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:00
 */

namespace order\discountSpecifications;


abstract class CompositeSpecification implements Specification
{
    abstract public function isSatisfiedBy($candidate);

    public function and(Specification $other)
    {
        return new AndSpecification($this, $other);
    }

    public function or(Specification $other)
    {
        return new OrSpecification($this, $other);
    }

    public function not(Specification $other)
    {
        return new NotSpecification($other);
    }
}
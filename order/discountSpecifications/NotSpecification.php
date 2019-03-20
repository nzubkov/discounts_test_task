<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:05
 */

namespace order\discountSpecifications;


class NotSpecification
{
    private $wrappedSpec;

    public function __construct(Specification $spec)
    {
        $this->wrappedSpec = $spec;
    }

    public function isSatisfiedBy($candidate)
    {
        return !$this->wrappedSpec->isSatisfiedBy($candidate);
    }
}
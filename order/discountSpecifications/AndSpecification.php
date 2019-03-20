<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 5:02
 */

namespace order\discountSpecifications;


class AndSpecification extends CompositeSpecification
{
    private $spec1;
    private $spec2;

    public function __construct(Specification $spec1, Specification $spec2)
    {
        $this->spec1 = $spec1;
        $this->spec2 = $spec2;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->spec1->isSatisfiedBy($candidate) && $this->spec2->isSatisfiedBy($candidate);
    }
}
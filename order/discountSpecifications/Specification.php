<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 18.03.2019
 * Time: 4:58
 */

namespace order\discountSpecifications;


interface Specification
{
    public function isSatisfiedBy($candidate);

    public function and(Specification $other);

    public function or(Specification $other);

    public function not(Specification $other);
}
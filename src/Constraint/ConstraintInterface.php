<?php

namespace Avaslev\Validator\Constraint;


/**
 * Interface ConstraintInterface
 * @package Avaslev\Validator\Constraint
 */
interface ConstraintInterface
{
    /**
     * @param $subject
     * @return bool
     */
    public function verify($subject): bool;
}
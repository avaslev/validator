<?php

namespace Avaslev\Validator;


use Avaslev\Validator\Constraint\ConstraintInterface;

/**
 * Class Validator
 * @package Avaslev\Validator
 */
class Validator
{
    /**
     * @param ConstraintInterface $constraint
     * @param $subject
     * @return bool
     */
    public function validate (ConstraintInterface $constraint, $subject): bool
    {
        return $constraint->verify($subject);
    }
}
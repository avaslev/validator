<?php

namespace Avaslev\Validator\Constraint;


use Prophecy\Exception\InvalidArgumentException;

/**
 * Class OpenCloseParenthesesConstrain
 * @package Avaslev\Validator\Constraint
 */
class OpenCloseParenthesesConstrain implements ConstraintInterface
{
    const PARENTHESES = '()';
    const OTHER_CHARS = [" ", "\n", "\t", "\r"];

    /**
     * @param $subject
     * @return bool
     */
    public function verify($subject): bool
    {
        $this->checkSubject($subject);

        $subject = str_replace(self::OTHER_CHARS, '', $subject);

        return $this->pinchOpenCloseParentheses($subject) === '';
    }

    /**
     * @param $subject
     */
    private function checkSubject($subject)
    {
        if (!is_string($subject)) {
            throw new InvalidArgumentException('Not a string');
        }

        if (empty($subject)) {
            throw new InvalidArgumentException('Empty string');
        }

        if (trim($subject, '()' . implode('', self::OTHER_CHARS)) !== '') {
            throw new InvalidArgumentException('Invalid string');
        }
    }

    /**
     * @param string $string
     * @return string
     */
    private function pinchOpenCloseParentheses(string $string): string
    {
        if (strpos($string, self::PARENTHESES) !== false) {
            $string = str_replace(self::PARENTHESES, '', $string);
            return $this->pinchOpenCloseParentheses($string);
        }
        return $string;
    }
}
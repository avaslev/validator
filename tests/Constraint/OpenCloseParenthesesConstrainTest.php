<?php

namespace Avaslev\Validator\Test\Constraint;


use Avaslev\Validator\Constraint\OpenCloseParenthesesConstrain;
use PHPUnit\Framework\TestCase;

/**
 * Class OpenCloseParenthesesConstrainTest
 * @package Avaslev\Validator\Test\Constraint
 */
class OpenCloseParenthesesConstrainTest extends TestCase
{

    /** @var OpenCloseParenthesesConstrain */
    private $constrain;

    /**
     * OpenCloseParenthesesConstrainTest constructor.
     * @param null|string $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->constrain = new OpenCloseParenthesesConstrain();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanBeVerifyArray()
    {
        $this->constrain->verify([1, 2, 'test']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanBeVerifyBadString()
    {
        $this->constrain->verify('123()');
        $this->constrain->verify('');
    }

    public function testSuccessVerify ()
    {
        $this->assertTrue($this->constrain->verify('()'));
        $this->assertTrue($this->constrain->verify("()()"));
        $this->assertTrue($this->constrain->verify("()( )"));
        $this->assertTrue($this->constrain->verify("()(\r)"));
        $this->assertTrue($this->constrain->verify("()(\n)"));
        $this->assertTrue($this->constrain->verify("()(\t)"));
    }

    public function testInvalidVerify ()
    {
        $this->assertFalse($this->constrain->verify('('));
        $this->assertFalse($this->constrain->verify('(()'));
        $this->assertFalse($this->constrain->verify('()()())'));
        $this->assertFalse($this->constrain->verify('))))'));
        $this->assertFalse($this->constrain->verify('(()()()()))((((()()()))(()()()(((()))))))'));
    }
}
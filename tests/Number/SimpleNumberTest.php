<?php

namespace SimplePHPEasyPlus\Number;

class SimpleNumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorThrowsAnExceptionIfTheGivenValueIsNotAFloat()
    {
        new SimpleNumber((int) 1);
    }

    public function testGetValueReturnsTheValueSetInTheConstructor()
    {
        $number = new SimpleNumber(1.0);

        $this->assertEquals(1.0, $number->getValue());
    }
}

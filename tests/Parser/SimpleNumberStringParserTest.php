<?php

namespace SimplePHPEasyPlus\Parser;

class SimpleNumberStringParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParseReturnAFloat()
    {
        $parser = new SimpleNumberStringParser();

        $this->assertInternalType('float', $parser->parse('1'));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowAnInvalidArgumentExceptionWhenTheParameterIsNotAString()
    {
        $parser = new SimpleNumberStringParser();

        $parser->parse(1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowAnInvalidArgumentExceptionWhenTheParameterIsNotANumericValue()
    {
        $parser = new SimpleNumberStringParser();

        $parser->parse('1.0.0');
    }
}

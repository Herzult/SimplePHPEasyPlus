<?php

namespace SimplePHPEasyPlus\Calcul;

class CalculTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage You must run me before
     */
    public function testGetResultWithoutResultShouldFail()
    {
        $engine = $this->getMockBuilder('SimplePHPEasyPlus\Engine')
            ->disableOriginalConstructor()
            ->getMock();
        $engine->expects($this->never())
            ->method('run');

        $numberCollection = $this->getMock('SimplePHPEasyPlus\Number\NumberCollection');

        $calcul = new Calcul($engine, $numberCollection);
        $calcul->getResult();
    }
}

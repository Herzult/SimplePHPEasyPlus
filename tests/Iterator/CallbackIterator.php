<?php

namespace SimplePHPEasyPlus\Iterator;

class CallbackIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIterate()
    {
        $items = array(1, 2);
        $iteratorable = $this->getMock('SimplePHPEasyPlus\Iterator\IteratorableInterface', array('getItems'), array(), '');
        $iteratorable->expects($this->once())
            ->method('getItems')
            ->will($this->returnValue($items));
        $closure = function($item) { $item++; };
        $iterator = new CallbackIterator($closure);
        $iterator->iterate($iteratorable);
        $this->assertSame(array(2, 3), $items);
    }
}

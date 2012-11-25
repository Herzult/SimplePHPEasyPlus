<?php

namespace SimplePHPEasyPlus\Iterator;

class CallbackIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIterate()
    {
        $itemMock = $this->getMock('stdClass', array('test'));
        $itemMock->expects($this->once())
            ->method('test');
        $items = array($itemMock);
        $iteratorable = $this->getMock('SimplePHPEasyPlus\Iterator\IteratorableInterface', array('getItems'), array(), '');
        $iteratorable->expects($this->once())
            ->method('getItems')
            ->will($this->returnValue($items));
        $closure = function($item) { $item->test(); };
        $iterator = new CallbackIterator($closure);
        $iterator->iterate($iteratorable);
    }
}

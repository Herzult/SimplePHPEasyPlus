<?php

namespace SimplePHPEasyPlus\Number;

use OutOfRangeException;
use PHPUnit_Framework_TestCase;

class NumberCollectionTest extends PHPUnit_Framework_TestCase
{
    public function testNumberCollectionCanNotContainMoreThanTwoNumbers()
    {
        $number = new SimpleNumber(1.0);
        $proxy = new CollectionItemNumberProxy($number);

        $collection = new NumberCollection();
        $collection->add(clone $proxy);
        $collection->add(clone $proxy);

        try {
            $collection->add(clone $proxy);
        } catch (OutOfRangeException $expected) {
            return;
        }

        $this->fail('Excpected out of range exception has not been raised.');
    }
}

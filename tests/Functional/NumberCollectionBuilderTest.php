<?php

use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Number\SimpleNumber;
use SimplePHPEasyPlus\Number\CollectionItemNumberProxy;
use SimplePHPEasyPlus\Number\NumberCollectionBuilder;
use SimplePHPEasyPlus\Number\SimpleNumberFactory;
use SimplePHPEasyPlus\Number\CollectionItemNumberProxyFactory;
use SimplePHPEasyPlus\Parser\SimpleNumberStringParserFactory;

class NumberCollectionBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testNumberCollectionBuilding()
    {
        $numberCollectionBuilder = new NumberCollectionBuilder(
            new SimpleNumberStringParserFactory(),
            new SimpleNumberFactory(),
            new CollectionItemNumberProxyFactory()
        );
        $numberCollectionBuilder->add('2');
        $numberCollectionBuilder->add('3');

        $numberCollection = $numberCollectionBuilder->resolve();

        $expected = new NumberCollection();
        $expected->add(new CollectionItemNumberProxy(new SimpleNumber(2.0)));
        $expected->add(new CollectionItemNumberProxy(new SimpleNumber(3.0)));
        $this->assertEquals($expected, $numberCollection);
    }
}

<?php

namespace SimplePHPEasyPlus\Number;

class NumberCollectionBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testResolveShouldCallFactoriesForEachNumber()
    {
        $parser = $this->getMock('SimplePHPEasyPlus\Parser\SimpleNumberStringParserInterface');
        $parser->expects($this->at(0))
               ->method('parse')
               ->with('2')
               ->will($this->returnValue(2.0));
        $parser->expects($this->at(1))
               ->method('parse')
               ->with('3')
               ->will($this->returnValue(3.0));

        $parserFactory = $this->getMock('SimplePHPEasyPlus\Parser\SimpleNumberStringParserFactoryInterface');
        $parserFactory->expects($this->exactly(2))
                      ->method('createParser')
                      ->will($this->returnValue($parser));

        $numberFactory = $this->getMock('SimplePHPEasyPlus\Number\NumberFactoryInterface');
        $numberFactory->expects($this->at(0))
                      ->method('createNumber')
                      ->with(2.0)
                      ->will($this->returnValue(new SimpleNumber(2.0)));
        $numberFactory->expects($this->at(1))
                      ->method('createNumber')
                      ->with(3.0)
                      ->will($this->returnValue(new SimpleNumber(3.0)));

        $collectionItemNumberProxyFactory = $this->getMock('SimplePHPEasyPlus\Number\CollectionItemNumberProxyFactoryInterface');
        $collectionItemNumberProxyFactory->expects($this->at(0))
                                         ->method('createCollectionItem')
                                         ->with(new SimpleNumber(2.0))
                                         ->will($this->returnValue(new CollectionItemNumberProxy(new SimpleNumber(2.0))));
        $collectionItemNumberProxyFactory->expects($this->at(1))
                                         ->method('createCollectionItem')
                                         ->with(new SimpleNumber(3.0))
                                         ->will($this->returnValue(new CollectionItemNumberProxy(new SimpleNumber(3.0))));

        $numberCollectionBuilder = new NumberCollectionBuilder(
            $parserFactory,
            $numberFactory,
            $collectionItemNumberProxyFactory
        );
        $numberCollectionBuilder->add('2');
        $numberCollectionBuilder->add('3');

        $numberCollection = $numberCollectionBuilder->resolve();
    }
}

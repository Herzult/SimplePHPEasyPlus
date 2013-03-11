<?php

namespace SimplePHPEasyPlus\Number;

use SimplePHPEasyPlus\Parser\SimpleNumberStringParserFactoryInterface;

class NumberCollectionBuilder
{
    private $parserFactory;
    private $simpleNumberFactory;
    private $collectionItemNumberProxyFactory;
    private $stringNumbers = array();

    public function __construct(
        SimpleNumberStringParserFactoryInterface $parserFactory,
        NumberFactoryInterface $simpleNumberFactory,
        CollectionItemNumberProxyFactoryInterface $collectionItemNumberProxyFactory
    ) {
        $this->parserFactory = $parserFactory;
        $this->simpleNumberFactory = $simpleNumberFactory;
        $this->collectionItemNumberProxyFactory = $collectionItemNumberProxyFactory;
    }

    public function add($stringNumber)
    {
        $this->stringNumbers[] = $stringNumber;
    }

    public function resolve()
    {
        $numberCollection = new NumberCollection();

        foreach ($this->stringNumbers as $stringNumber) {
            $parser = $this->parserFactory->createParser();
            $parsed = $parser->parse($stringNumber);

            $number = $this->simpleNumberFactory->createNumber($parsed);
            $collectionItem = $this->collectionItemNumberProxyFactory->createCollectionItem($number);

            $numberCollection->add($collectionItem);
        }

        return $numberCollection;
    }
}

<?php

namespace SimplePHPEasyPlus\Number;

class CollectionItemNumberProxy implements NumberInterface, CollectionItemNumberProxyInterface
{
    protected $number;

    public function __construct(NumberInterface $number)
    {
        $this->number = $number;
    }

    public function getValue()
    {
        return $this->number->getValue();
    }
}

<?php

namespace SimplePHPEasyPlus\Number;

class CollectionItemNumberProxyFactory implements CollectionItemNumberProxyFactoryInterface
{
    public function createCollectionItem(NumberInterface $number)
    {
        return new CollectionItemNumberProxy($number);
    }
}

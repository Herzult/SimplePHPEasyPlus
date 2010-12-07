<?php

namespace SimplePHPEasyPlus;

use SimplePHPEasyPlus\Operation\OperationInterface;
use SimplePHPEasyPlus\Number\NumberCollection;

class Engine
{
    protected $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    public function run(NumberCollection $collection)
    {
        return $this->operation->operate($collection);
    }
}

<?php

namespace SimplePHPEasyPlus;

use SimplePHPEasyPlus\Operation\OperationInterface;
use SimplePHPEasyPlus\NumberCollection\Number;

class Engine
{
    protected $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    public function run(NumberCollection $collection)
    {
        $this->operation->operate($collection);
    }
}

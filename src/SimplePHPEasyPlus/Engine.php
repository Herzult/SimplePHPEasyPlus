<?php

namespace SimplePHPEasyPlus;

use SimplePHPEasyPlus\Operation\OperationInterface;
use SimplePHPEasyPlus\Number\NumberCollection;

class Engine
{
    /**
     * @var OperationInterface
     */
    protected $operation;

    /**
     * @param OperationInterface $operation
     */
    public function __construct(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @param NumberCollection $collection
     *
     * @return OperationResult
     */
    public function run(NumberCollection $collection)
    {
        return $this->operation->operate($collection);
    }
}

<?php

namespace SimplePHPEasyPlus\Operation;

use SimplePHPEasyPlus\Operator\OperatorInterface;
use SimplePHPEasyPlus\Number\NumberCollection;

class ArithmeticOperation implements OperationInterface
{
    protected $operator;

    public function __construct(OperatorInterface $operator)
    {
        $this->operator = $operator;
    }

    public function operate(NumberCollection $collection)
    {
        return $this->getOperator()->process($collection->getFirstItem(), $collection->getSecondItem());
    }

    protected function getOperator()
    {
        return $this->operator;
    }
}

<?php

namespace SimplePHPEasyPlus\Operation;

use SimplePHPEasyPlus\Operator\OperatorInterface;
use SimplePHPEasyPlus\Number\NumberCollection;

class ArithmeticOperation implements OperationInterface
{
    /**
     * @var OperatorInterface
     */
    protected $operator;

    /**
     * @param OperatorInterface $operator
     */
    public function __construct(OperatorInterface $operator)
    {
        $this->operator = $operator;
    }

    /**
     * @param NumberCollection $collection
     *
     * @return \SimplePHPEasyPlus\Number\NumberInterface
     */
    public function operate(NumberCollection $collection)
    {
        return $this->getOperator()->process($collection->getFirstItem(), $collection->getSecondItem());
    }

    /**
     * @return OperatorInterface
     */
    protected function getOperator()
    {
        return $this->operator;
    }
}

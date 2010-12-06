<?php

namespace SimplePHPEasyPlus\Operator;

class AdditionOperator extends CallbackOperator implements OperatorInterface
{
    protected function atomicOperation(NumberInterface $numberOne, NumberInterface $numberTwo)
    {
        $resultClass = get_class($numberOne);

        $result = new $resultClass($numberOne->getNumericValue() + $numberTwo->getNumericValue());

        return $result;
    }
}

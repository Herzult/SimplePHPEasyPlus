<?php

namespace SimplePHPEasyPlus\Operator;

class AdditionOperator extends CallbackOperator implements OperatorInterface
{
    protected function atomicOperation(NumberInterface $numberOne, NumberInterface $numberTwo)
    {
        #FIXME this is damn ugly! Sorry for the shameful hack
        $resultClass = get_class($numberOne);

        $numbers = array($numberOne->getValue(), $numberTwo->getValue());
        $result = new $resultClass(array_sum($numbers));

        return $result;
    }
}

<?php

namespace SimplePHPEasyPlus\Operator;
use SimplePHPEasyPlus\Number;

class AdditionOperator implements OperatorInterface
{
    protected function process(NumberInterface $numberOne, NumberInterface $numberTwo)
    {
        #FIXME this is damn ugly! Sorry for the shameful hack
        $resultClass = get_class($numberOne);

        $numbers = array($numberOne->getValue(), $numberTwo->getValue());
        $result = new $resultClass(array_sum($numbers));

        return $result;
    }
}

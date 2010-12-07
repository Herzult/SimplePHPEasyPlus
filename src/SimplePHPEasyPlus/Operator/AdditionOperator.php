<?php

namespace SimplePHPEasyPlus\Operator;
use SimplePHPEasyPlus\Number\NumberInterface;

class AdditionOperator implements OperatorInterface
{
    protected $resultClass;

    public function __construct($resultClass)
    {
        $this->resultClass = $resultClass;
    }

    public function process(NumberInterface $numberOne, NumberInterface $numberTwo)
    {
        $resultClass = $this->resultClass;

        $numbers = array($numberOne->getValue(), $numberTwo->getValue());
        $result = new $resultClass(array_sum($numbers));

        return $result;
    }
}

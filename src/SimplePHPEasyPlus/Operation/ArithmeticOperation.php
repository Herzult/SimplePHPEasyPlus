<?php

namespace SimplePHPEasyPlus\Operation;

use SimplePHPEasyPlus\OperatorInterface;
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
        foreach($collection as $index => $number) {
            if($index === 0) {
                $firstNumber = $number;
            } elseif($index === 1) {
                $secondNumber = $number;
            } else {
                throw new OutOfRangeException('A number collection must not have more (nor less) than 2 numbers.');
            }
        }

        return $this->getOperator()->process($firstNumber, $secondNumber);
    }

    protected function getOperator()
    {
        return $this->operator;
    }
}

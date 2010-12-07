<?php

namespace SimplePHPEasyPlus\Operator;
use SimplePHPEasyPlus\Number\NumberInterface;

interface OperatorInterface
{
    function process(NumberInterface $firstNumber, NumberInterface $secondNumber);
}

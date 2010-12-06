<?php

namespace SimplePHPEasyPlus\Operator;
use SimplePHPEasyPlus\Number;

interface OperatorInterface
{
    function process(NumberInterface $firstNumber, NumberInterface $secondNumber);
}

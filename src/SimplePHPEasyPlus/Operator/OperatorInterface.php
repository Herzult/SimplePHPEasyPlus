<?php

namespace SimplePHPEasyPlus\Operator;

use SimplePHPEasyPlus\Number\NumberInterface;

interface OperatorInterface
{
    /**
     * @param NumberInterface $firstNumber
     * @param NumberInterface $secondNumber
     *
     * @return NumberInterface
     */
    public function process(NumberInterface $firstNumber, NumberInterface $secondNumber);
}

<?php

namespace SimplePHPEasyPlus\Operator;

abstract class CallbackOperator extends Operator
{
    public function process(CollectionInterface $numberCollection)
    {
        $result = new Result();

        $closure = $this->getClosure();

        $this->operator->iterate($numberCollection, $closure);

        return $result;
    }

    public function getClosure()
    {
        return function(NumberInterface $number) use (NumberInterface $result)
        {
            $result = $this->atomicOperation($result->getNumericValue(), $number);
        };
    }

    abstract protected function atomicOperation(NumberInterface $numberOne, NumberInterface $numberTwo);
}

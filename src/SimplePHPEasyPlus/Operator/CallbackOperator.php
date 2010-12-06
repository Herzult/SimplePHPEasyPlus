<?php

namespace SimplePHPEasyPlus\Operator;

abstract class CallbackOperator extends Operator
{
    public function process(CollectionInterface $numberCollection)
    {
        $result = new Result();

        $closure = $this->createClosure();
        $this->operator->setClosure($closure);

        $this->operator->iterate($numberCollection);

        return $result;
    }

    public function createClosure()
    {
        return function(NumberInterface $number) use ($result)
        {
            $result = $this->atomicOperation($result->getNumericValue(), $number);
        };
    }

    abstract protected function atomicOperation(NumberInterface $numberOne, NumberInterface $numberTwo);
}

<?php

namespace SimplePHPEasyPlus\Operation;

use SimplePHPEasyPlus\Number\NumberCollection;

interface OperationInterface
{
    /**
     * This method must operation on the given collection
     *
     * @param  CollectionInterface $collection
     *
     * @return OperationResult
     */
    public function operate(NumberCollection $collection);
}

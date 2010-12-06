<?php

namespace SimplePHPEasyPlus\Operation;

use SimplePHPEasyPlus\Collection\CollectionInterface;

interface OperationInterface
{
    /**
     * This method must operation on the given collection
     *
     * @param  CollectionInterface $collection
     *
     * @return OperationResult
     */
    public function operate(CollectionInterface $collection);
}

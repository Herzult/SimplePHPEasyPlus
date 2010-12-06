<?php

namespace SimplePHPEasyPlus\Operator;
use SimplePHPEasyPlus\Iterator\IteratorInterface;

abstract class Operator
{
    protected $iterator;

    public function __construct(IteratorInterface $iterator)
    {
        $this->iterator = $iterator;
    }
}

<?php

namespace SimplePHPEasyPlus\Operator;

abstract class Operator
{
    protected $iterator;

    public function __construct(IteratorInterface $iterator)
    {
        $this->iterator = $iterator;
    }
}

<?php

namespace SimplePHPEasyPlus\Number;

class SimpleNumberFactory implements NumberFactoryInterface
{
    public function createNumber($value)
    {
        return new SimpleNumber($value);
    }
}

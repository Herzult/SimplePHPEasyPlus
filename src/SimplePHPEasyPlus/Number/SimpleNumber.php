<?php

namespace SimplePHPEasyPlus\Number;

class SimpleNumber extends Number implements SimpleNumberInterface
{
    /**
     * @var float The number float value
     */
    protected $value;

    /**
     * Constructor
     *
     * @param float $value
     */
    public function __construct($value)
    {
        if (! is_float($value)) {
            throw new NumberInvalidArgumentException('The given value must be a float.');
        }

        $this->value = $value;
    }

    /**
     * @see SimpleNumberInterface
     */
    public function getValue()
    {
        return $this->value;
    }
}

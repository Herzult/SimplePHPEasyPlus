<?php

namespace SimplePHPEasyPlus\Number;

use SimplePHPEasyPlus\Collection\CollectionInterface;

/**
 * Represents a number collection
 */
class NumberCollection implements CollectionInterface
{
    /**
     * @var array  An array of NumberValue items
     */
    protected $numbers;

    /**
     * Adds a number to the collection
     *
     * @param  NumberInput $number
     */
    public function add(Number $number)
    {
        $this->numbers[] = $number;
    }
}

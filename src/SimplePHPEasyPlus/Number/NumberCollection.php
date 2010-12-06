<?php

namespace SimplePHPEasyPlus\Number;

use SimplePHPEasyPlus\Collection\CollectionInterface;

/**
 * Represents a number collection
 */
class NumberCollection implements CollectionInterface
{
    /**
     * @var ArrayObject  An array of NumberValue items
     */
    protected $numbers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numbers = new \ArrayObject();
    }

    /**
     * Adds a number to the collection
     *
     * @param  Number $number
     */
    public function add(Number $number)
    {
        $this->numbers->append($number);
    }


}

<?php

namespace SimplePHPEasyPlus\Number;

use SimplePHPEasyPlus\Collection\CollectionInterface;
use SimplePHPEasyPlus\Collection\CollectionItemInterface;

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
     * @param  CollectionItemInterface $number
     */
    public function add(CollectionItemNumberProxyInterface $number)
    {
        $this->numbers->append($number);
    }


}

<?php

namespace SimplePHPEasyPlus\Number;

use ArrayObject;
use OutOfRangeException;
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
        $this->numbers = new ArrayObject();
    }

    /**
     * Adds a number to the collection
     *
     * @param CollectionItemInterface $number
     */
    public function add(CollectionItemInterface $number)
    {
        if (2 === $this->numbers->count()) {
            throw new OutOfRangeException('The number collection can not contain more than two numbers.');
        }

        $this->numbers->append($number);
    }

    /**
     * Gets the first item
     *
     * @return CollectionItemInterface
     **/
    public function getFirstItem()
    {
        return $this->numbers[0];
    }

    /**
     * Gets the second item
     *
     * @return CollectionItemInterface
     **/
    public function getSecondItem()
    {
        return $this->numbers[1];
    }
}

<?php

namespace SimplePHPEasyPlus\Collection;

interface CollectionInterface
{
    /**
     * This method must add an item to the collection
     *
     * @param  CollectionItemInterface $item
     */
    function add(CollectionItemInterface $item);
}

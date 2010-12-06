<?php

namespace SimplePHPEasyPlus\Collection;

interface SortedCollectionInterface extends CollectionInterface
{
    /**
     * This method must prepend an item to the collection
     *
     * @param  CollectionItemInterface $item
     */
    public function prepend(CollectionItemInterface $item);

    /**
     * This method must append an item to the collection
     *
     * @param  CollectionItemInterface $item
     */
    public function append(CollectionItemInterface $item);
}

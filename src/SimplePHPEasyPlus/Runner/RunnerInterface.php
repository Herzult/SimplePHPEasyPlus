<?php

namespace SimplePHPEasyPlus\Runner;

interface RunnerInterface
{
    /**
     * This method must run the given runnable
     *
     * @param RunnableInterface $runnable
     */
    public function run(RunnableInterface $runnable);
}

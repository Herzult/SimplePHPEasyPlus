<?php

namespace SimplePHPEasyPlus\Runner;

interface RunnerInterface
{
    /**
     * This method must run the given runnable
     *
     * @param  RunnableInterface $runnable
     */
    function run(RunnableInterface $runnable);
}

<?php

namespace SimplePHPEasyPlus\Runner;

abstract class Runner implements RunnerInterface
{
    /**
     * @see RunnerInerface
     */
    public function run(RunnableInterface $runnable)
    {
        $runnable->run();
    }
}

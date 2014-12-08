<?php

namespace SimplePHPEasyPlus\Runner;

abstract class Runner implements RunnerInterface
{
    /**
     * @see RunnerInerface
     *
     * {@inheritdoc}
     */
    public function run(RunnableInterface $runnable)
    {
        $runnable->run();
    }
}

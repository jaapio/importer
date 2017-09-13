<?php

namespace PolderKnowledge\Importer\Step;

use PolderKnowledge\Importer\Reader\Reader;
use Webmozart\Assert\Assert;

final class FilterKey implements Step
{
    /**
     * @var Step
     */
    private $step;

    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ($this->step->fetch() as $item) {
            unset($item[$this->key]);
            yield $item;
        }
    }

    public function attach(Reader $step)
    {
        $this->step = $step;
    }
}

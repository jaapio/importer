<?php

namespace PolderKnowledge\Importer\Step;

use PolderKnowledge\Importer\Reader\Reader;
use Webmozart\Assert\Assert;

class MapKeys implements Step
{
    /**
     * @var Step
     */
    private $step;

    private $keys;

    public function __construct(array $keys)
    {
        Assert::allString($keys);
        $this->keys = $keys;
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ($this->step->fetch() as $item) {
            yield array_combine(
                $this->keys,
                $item
            );
        }
    }

    public function attach(Reader $step)
    {
        $this->step = $step;
    }
}

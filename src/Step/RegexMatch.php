<?php


namespace PolderKnowledge\Importer\Step;


use PolderKnowledge\Importer\Reader\Reader;

final class RegexMatch implements Step
{
    /**
     * @var Step
     */
    private $step;

    private $key;
    /**
     * @var
     */
    private $pattern;

    public function __construct($key, $regex)
    {
        $this->key = $key;
        $this->pattern = '/' . $regex . '/';
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ($this->step->fetch() as $item) {
            $value = $item[$this->key];
            $matches = [];
            preg_match($this->pattern, $value, $matches);
            $item[$this->key] = $matches[1];
            yield $item;
        }
    }

    public function attach(Reader $step)
    {
        $this->step = $step;
    }
}

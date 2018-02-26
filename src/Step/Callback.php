<?php


namespace PolderKnowledge\Importer\Step;


use PolderKnowledge\Importer\Reader\Reader;
use Zend\Db\Sql\Ddl\Column\Datetime;

final class Callback implements Step
{
    /**
     * @var Step
     */
    private $step;

    private $key;

    private $callback;

    public function __construct($key, callable $callback)
    {
        $this->key = $key;
        $this->callback = $callback;
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ($this->step->fetch() as $item) {
            $value = $item[$this->key];

            $item[$this->key] = call_user_func($this->callback, $value, $item);
            yield $item;
        }
    }

    public function attach(Reader $step)
    {
        $this->step = $step;
    }
}

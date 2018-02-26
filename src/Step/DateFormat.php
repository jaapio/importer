<?php


namespace PolderKnowledge\Importer\Step;


use PolderKnowledge\Importer\Reader\Reader;
use Zend\Db\Sql\Ddl\Column\Datetime;

final class DateFormat implements Step
{
    /**
     * @var Step
     */
    private $step;

    private $key;

    private $format;

    public function __construct($key, $format)
    {
        $this->key = $key;
        $this->format = $format;
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ($this->step->fetch() as $item) {
            $value = $item[$this->key];

            $item[$this->key] = \DateTime::createFromFormat($this->format, $value)->format('Y-m-d');
            yield $item;
        }
    }

    public function attach(Reader $step)
    {
        $this->step = $step;
    }
}

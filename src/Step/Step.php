<?php


namespace PolderKnowledge\Importer\Step;

use PolderKnowledge\Importer\Reader\Reader;

interface Step extends Reader
{
    public function attach(Reader $step);
}

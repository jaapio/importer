<?php
/**
 *  Polder Knowledge /  Importer (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/Importer for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/Importer/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\Importer;

use PolderKnowledge\Importer\Reader\Reader;
use PolderKnowledge\Importer\Writer\Writer;

final class Importer
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var Writer
     */
    private $writer;

    public function __construct(Reader $reader, Writer $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    public function execute()
    {
        $this->writer->open();

        foreach ($this->reader->fetch() as $item) {
            $this->writer->write($item);
        }

        $this->writer->close();
    }
}

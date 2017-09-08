<?php
/**
 *  Polder Knowledge /  Importer (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/Importer for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/Importer/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\Importer\Reader;


final class CsvReader implements Reader
{
    /**
     * @var \League\Csv\Reader
     */
    private $reader;

    private function __construct(\League\Csv\Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param string $path
     * @return static
     */
    public static function createFromPath($path)
    {
        return new static(\League\Csv\Reader::createFromPath($path));
    }

    /**
     * @return \Generator
     */
    public function fetch()
    {
        foreach ( $this->reader->fetch() as $line) {
            yield $line;
        }
    }
}

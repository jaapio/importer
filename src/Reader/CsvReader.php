<?php
/**
 *  Polder Knowledge /  Importer (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/Importer for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/Importer/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\Importer\Reader;

use Generator;
use League\Csv\Reader as LeagueReader;

final class CsvReader implements Reader
{
    /** @var LeagueReader */
    private $reader;

    private function __construct(LeagueReader $reader)
    {
        $this->reader = $reader;
    }

    public static function createFromPath(string $path): CsvReader
    {
        return new static(LeagueReader::createFromPath($path));
    }

    public function fetch(): Generator
    {
        foreach ($this->reader as $line) {
            yield $line;
        }
    }
}

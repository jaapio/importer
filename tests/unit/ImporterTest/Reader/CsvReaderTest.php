<?php
/**
 *  Polder Knowledge /  ${PROJECT_NAME} (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/${PROJECT_NAME} for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/authentication/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\ImporterTest;

use PolderKnowledge\Importer\Reader\CsvReader;

class CsvReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testFetch()
    {
        $reader = CsvReader::createFromPath(__DIR__ . '/../../assets/simple.csv');

        $result = [];
        foreach ($reader->fetch() as $line) {
            $result[] = $line;
        }

        static::assertEquals(
            [
                [1, 2],
                [2, 3]
            ],
            $result
        );
    }
}

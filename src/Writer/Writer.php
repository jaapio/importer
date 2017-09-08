<?php
/**
 *  Polder Knowledge /  Importer (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/Importer for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/Importer/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\Importer\Writer;


interface Writer
{
    public function open();
    public function write(array $item);
    public function close();
}

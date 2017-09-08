<?php
/**
 *  Polder Knowledge /  Importer (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/Importer for the canonical source repository
 * @copyright Copyright (c) 2017 Polder Knowledge (https://polderknowledge.com)
 * @license https://github.com/polderknowledge/Importer/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\Importer\Writer;


use Doctrine\DBAL\Connection;

class DoctrineDBAL implements Writer
{
    /**
     * @var Connection
     */
    private $connection;

    /** @var \Doctrine\DBAL\Driver\Statement */
    private $statement;

    public function __construct(Connection $connection, $statement)
    {
        $this->connection = $connection;
        $this->statement = $this->connection->prepare($statement);
    }

    public function open()
    {
        $this->connection->beginTransaction();
    }

    /**
     * @param array $item
     * @return bool
     */
    public function write(array $item)
    {
        return $this->statement->execute($item);
    }

    public function close()
    {
        $this->connection->commit();
    }
}

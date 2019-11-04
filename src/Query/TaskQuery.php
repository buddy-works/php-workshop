<?php


namespace App\Query;


use App\Query\Model\Task;
use Doctrine\DBAL\Connection;

final class TaskQuery
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Task[]
     */
    public function findAll(): array
    {
        return array_map(function(array $row): Task {
            return Task::fromArray($row);
        }, $this->connection->fetchAll('SELECT * FROM task'));
    }
}

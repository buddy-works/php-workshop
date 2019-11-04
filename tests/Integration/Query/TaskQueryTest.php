<?php


namespace App\Tests\Integration\Query;


use App\Entity\Task;
use App\Query\TaskQuery;
use App\Tests\Symfony\KernelTestCase;
use Doctrine\Common\Persistence\ObjectManager;

final class TaskQueryTest extends KernelTestCase
{
    public function testFindAll(): void
    {
        $this->databaseContext->createTask(42, 'New task');
        $query = self::$container->get(TaskQuery::class);

        $tasks = $query->findAll();
        self::assertCount(1, $tasks);
    }
}

<?php


namespace App\Tests\Unit\Entity;


use App\Entity\Task;
use PHPUnit\Framework\TestCase;

final class TodoTest extends TestCase
{
    public function testNotAllowToChangeTitleForCompletedTask(): void
    {
        $task = new Task(1, 'Some title');
        $task->complete();

        $this->expectException(\RuntimeException::class);

        $task->changeTitle('New one');
    }
}

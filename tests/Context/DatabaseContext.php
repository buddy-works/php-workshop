<?php

declare(strict_types=1);

namespace App\Tests\Context;

use App\Entity\Task;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;

final class DatabaseContext
{
    /**
     * @var TestContainer
     */
    private $container;

    public function __construct(TestContainer $container)
    {
        $this->container = $container;
    }

    public function purge(): void
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $em->clear();
        $em->getConnection()->exec('
            TRUNCATE TABLE task RESTART IDENTITY CASCADE;
        ');
    }

    public function createTask(int $userId, string $title): void
    {
        $manager = $this->container->get(ObjectManager::class);
        $manager->persist(new Task($userId, $title));
        $manager->flush();
    }
}

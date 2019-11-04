<?php

declare(strict_types=1);

namespace App\Tests\Symfony;

use App\Tests\Context\DatabaseContext;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase as BaseKernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;

abstract class KernelTestCase extends BaseKernelTestCase
{
    /**
     * @var TestContainer
     */
    protected static $container;

    /**
     * @var DatabaseContext
     */
    protected $databaseContext;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->databaseContext = new DatabaseContext(self::$container);
        $this->databaseContext->purge();
    }
}

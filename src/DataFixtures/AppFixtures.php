<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i=0; $i<10; $i++) {
            $manager->persist(new Task(
                $faker->randomNumber(2),
                $faker->sentence,
                $faker->boolean
            ));
        }

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actuality;
use Faker;

class ActualityFixtures extends Fixture
{
    public const ACTUALITY_NUMBER = 5;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < (self::ACTUALITY_NUMBER); $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->words(2, true));
            $actuality->setCreatedAt($faker->dateTime());
            $actuality->setPicture($faker->imageUrl(640, 480,true));
            $actuality->setContent($faker->paragraph(6, true));
            $manager->persist($actuality);
        }

        $manager->flush();
    }
}

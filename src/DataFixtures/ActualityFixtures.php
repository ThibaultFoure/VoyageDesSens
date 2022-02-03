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
            $actuality->setTitle('Titre notamment');
            $actuality->setCreatedAt($faker->dateTime());
            $actuality->setPicture('actu2.jpg');
            $actuality->setContent('GFsgiugizgfiyzifzgheifggzeizgeifuzeityzeoriutvyzert iat oia z to yazg toyzarg toiyzayzgrtazgt azge_tzae_ègt azo_egazgtoazg taz getgaz_egt oazgt');
            $manager->persist($actuality);
        }

        $manager->persist($actuality);

        $manager->flush();
    }
}

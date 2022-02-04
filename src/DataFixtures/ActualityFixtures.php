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
            $actuality->setContent('Une nouvelle année pour prendre soin de soi. 
            ✨S\'arrêter durant un instant et prendre du temps pour soi.
            ✨Se retrouver et mettre en priorité son bien être.
            ✨Soulager le stress et les douleurs qui peuvent animer chaque personne au quotidien.
            ✨Retrouver un équilibre intérieur.
            ✨S\'écouter, écouter son corps, son esprit. 
            Vous souhaitez soulager vos troubles, ressentir à nouveau un bien être intérieur ?
            Venez découvrir la réflexologie combinée, une méthode douce, puissante et sensorielle 🤗.
            Pour réserver votre séance, contactez moi au 06 32 56 01 27. 
            Un voyage des sens, à la rencontre du bien-être 🌟');
            $manager->persist($actuality);
        }

        $manager->persist($actuality);

        $manager->flush();
    }
}

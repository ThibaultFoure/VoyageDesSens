<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            'title' => 'Séance personnalisée',
            'description' => 'Après échange, un protocole personnalisé sera réalisé afin de vous faire bénéficier d\'une séance de réflexologie au plus proche de vos besoins. Vous pourrez ainsi profiter d\'une séance d\'une heure et vous laisser aller dans cette bulle de bien-être intense.',
            'priceDescription' => '50€ 
            1 séance
            1 heure',
        ],
        [
            'title' => 'Séances spécifiques',
            'description' => '',
            'priceDescription' => '135€
            3 séances sur 21 jours
            1 heure
            suivi d\'une séance par mois si nécessaire 40 euros',
        ],
        [
            'title' => 'Cures de bien-être',
            'description' => 'Dans votre cabinet de réflexologie, venez découvrir les cures spécifiques de bien-être pour retrouver un rythme de vie harmonieux 🙏.
        Pendant un mois vous profiterez de 3 séances de réflexologie d\'une heure sur le thème de votre choix :',
            'priceDescription' => '130€
            3 séances sur 21 jours
            1 heure',
        ],
        [
            'title' => 'Ateliers d\'auto-réflexologie',
            'description' => 'En famille, entre amis ou même seul, ces ateliers ont pour but de vous transmettre les bons gestes afin de pouvoir soulager vous-même certaines tensions.',
            'priceDescription' => '75€ par personne
            1 séance
            3 heures
            groupe de 4 à 6 personnes
            Kits contenants les instruments offerts',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $categoryInfos) {
            $category = new Category();
            $category->setTitle($categoryInfos['title']);
            $category->setDescription($categoryInfos['description']);
            $category->setpriceDescription($categoryInfos['priceDescription']);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}

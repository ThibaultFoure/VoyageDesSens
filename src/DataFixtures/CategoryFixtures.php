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
            'description' => 'Après échange, un protocole personnalisé sera réalisé afin de vous faire bénéficier d\'une séance de réflexologie au plus proche de vos besoins. Vous pourrez ainsi profiter d\'une séance d\'une heure et vous laisser aller dans cette bulle de bien-être intense.'
        ],
        [
            'title' => 'Séances spécifiques',
            'description' => '3 séances d\'une heure, réparties sur 21 jours.'
        ],
        [
            'title' => 'Cures de bien être',
            'description' => 'Dans votre cabinet de réflexologie, venez découvrir les cures spécifiques de bien-être pour retrouver un rythme de vie harmonieux 🙏. 

        Pendant un mois vous profiterez de 3 séances de réflexologie d\'une heure sur le thème de votre choix : 
        
        ✨ Votre vitalité est malmenée par votre quotidien ? Résultat : la fatigue, le stress, le manque d\'énergie et la baisse de moral se font ressentir.
        ❇️La cure Vitalité vous rendra votre dynamisme d\'antan pour profiter de la vie et prendre soin de vous durablement.
        
        ✨Boulot, métro, dodo ! Vous avez le sentiment d\'être intoxiqué par une vie trop chargée ...
        ❇️La cure Détox est un véritable drainage des toxines et une remise en forme du corps et de l\'esprit. À faire à chaque début de saison ou après des situations de stress pour vous redonner de l\'éclat. 
        
        ✨Vous trouvez que vous dormez mal. Insomnies, sommeil agité, réveils fatigués...Le stress et les maux quotidiens peuvent s\'accumuler et perturber vos nuits. 
        ❇️La cure anti-stress/sommeil vous aide à retrouver un rythme de vie harmonieux en resynchronisant votre horloge biologique. Vous repartirez apaisés et serein pour un équilibre retrouvé et des nuits enfin imperturbables. 
        
        ✨Vous avez pris quelque kilos et vous aimeriez les perdre ? 
        ❇️La cure Silhouette est une invitation à la minceur ! Les zones réflexes sélectionnées régulent la digestion, stimulent le corps et harmonisent le système nerveux pour retrouver votre ligne. 
        
        ✨Vous avez des douleurs au niveau des cervicales, entre les omoplates ou encore au niveau des lombaires ? 
        ❇️La cure bien-être du dos vous permet de retrouver un dos détendu et une posture plus équilibrée. Vous repartirez en forme pour mieux vous adapter aux différents besoins ergonomiques.'
        ],
        [
            'title' => 'Ateliers d\'auto-réflexologie',
            'description' => 'En famille, entre amis ou même seul, ces ateliers ont pour but de vous transmettre les bons gestes afin de pouvoir soulager vous-même certaines tensions.'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $categoryInfos) {
            $category = new Category();
            $category->setTitle($categoryInfos['title']);
            $category->setDescription($categoryInfos['description']);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}

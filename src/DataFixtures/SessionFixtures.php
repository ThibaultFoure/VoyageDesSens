<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Session;

class SessionFixtures extends Fixture
{
    public const SESSIONS = [
        [
            'title' => 'Bien-être et maladie de Crohn',
            'description' => '💡La maladie de Crohn est une maladie inflammatoire chronique de l\'intestin pouvant toucher tout le tube digestif. Elle évolue le plus souvent par poussées entrecoupées de périodes de rémissions et d\'accalmies pendant lesquelles il n\'y a aucune manifestation. 

        L\'inflammation peut se former à divers endroit du tube digestif et en atteindre une ou plusieurs parties. Elle se situe le plus fréquemment au niveau de la jonction de l\'intestin grêle et du gros intestin. 
        
        ✨ La réflexologie permet au corps de retrouver un état équilibre et d\'évacuer le stress induit par cette pathologie. Elle permet également d\'aider notre corps à éliminer les toxines. ✨
        
        La réflexologie ne substitue pas aux traitements et au suivi médical. C\'est un complément pour trouver un mieux-être face à cette pathologie. ',
            'price' => '',
            'category' => '1',
        ],
        [
            'title' => 'Bien-être sevrage tabagique',
            'description' => 'Arrêter de fumer est un acte courageux qui demande beaucoup de volonté 💪 !!! 
            Alors un petit coup de pouce peut être nécessaire pour rompre la dépendance. Comment stopper cette habitude néfaste naturellement ? La réflexologie combinée peut se révéler précieuse 😊. 
            
            Pour rappel la réflexologie est une pratique ancestral reconnue pour son efficacité à lutter contre le stress. En période de sevrage tabagique, nous avons tendance à ressentir du stress lié au manque. 
            
            Le sevrage tabagique est l\'arrêt de la consommation de tabac, dans le but de s\'affranchir de la dépendance induite. La dépendance physique au tabac est confirmée chez la plupart des fumeurs, la dépendance psychique tenant par ailleurs une place importante dans leur vie. 
            
            Le fumeur régulier privé brutalement de sa consommation ressent une sensation de manque. Il est tendu, nerveux, irritable, angoissée, voire d\'humeur triste. 
            
            L\'objectif de ces 3 séances ✨ : 
            - apporter du bien être durant le sevrage tabagique
            - diminuer les tensions physiques 
            - apporter un apaisement émotionnel',
            'price' => '',
            'category' => '1',
        ],
        [
            'title' => 'Bien-être et fibromyalgie',
            'description' => 'La fibromyalgie est un syndrome caractérisé par des douleurs diffusées autour de la colonne vertébrale, mais également dans les articulations, ce qui en fait la seconde maladie rhumatismale après l’arthrose. Elle est associée à une grande fatigue et à des troubles du sommeil. D’autres troubles peuvent être associés comme des troubles digestifs, des migraines, syndrôme prémenstruel…

            Ce syndrome n\'entraîne pas de complications graves, mais est très éprouvant et empêche souvent la personne qui en souffre d\'accomplir ses activités quotidiennes ou de fournir un travail à temps plein. Cette maladie, peu reconnue, vient également ajouter du stress, qui se répercute sur le corps et aggrave les symptômes. 
            
            Comment la réflexologie peut soulager la fibromyalgie ?
            
            La réflexologie est d’une grande aide pour soulager les symptômes de la fibromyalgie, car elle vient soulager non seulement les douleurs mais également le stress généré.
            
            La réflexologie combinée permet de venir stimuler avec douceur des zones ou points réflexes sur les mains, le visage les pieds ou les oreilles. Cela permet de travailler à distance des zones douloureuses, ce qui est souvent redouté par les personnes atteintes de cette pathologie✋🏼🦶🏼👂🏼👩🏼‍🦲.
            
            L\'objectif de ces 3 séances ✨:
            - apporter du bien-être à la personne 
            - libérer les tensions physiques 
            - apaiser les émotions
            
            La réflexologie ne substitue pas aux traitements et au suivi médical. C\'est un complément pour trouver un mieux-être face à cette pathologie. ',
            'price' => '',
            'category' => '1',
        ],
        [
            'title' => 'Bien-être et endométriose',
            'description' => 'L’endométriose, on en a tous entendu parler. Mais sait-on vraiment de quoi il s’agit ?🤷‍♀️

            Cette affection gynécologique si méconnue du grand public n’est pourtant pas une maladie de somatisation comme on l’a, si souvent, entendu dire. 
            
            Une femme souffrant de cette maladie vous dirait que lorsqu’elle a ses règles, les douleurs sont telles qu’elle est dans l’incapacité de se lever le matin pour aller travailler. 
            
            Combien de fois a-t-on entendu « si tu as mal pendant tes règles, c’est normal.... » ? 🙅‍♀️Et pourtant…
            
            L\'endometriose est une maladie chronique de l\'endomètre. Les principaux symptômes sont de fortes douleurs dans le bas ventre pendant les règles, les rapports sexuels, une grande fatigue... 
            Elle se caractérise par la présence de segments d\'endometre qui viennent se greffer en dehors de l\'utérus, sur des organes génitaux comme le corps de l\'utérus ou les ovaires. Mais également non génitaux comme le péritoine. Membrane tapissent la paroi abdominale ou le rectum. 
            
            La réflexologie permet de soulager les douleurs occasionnées par cette pathologie et soulager les tensions émotionnelles du quotidien. Elle permet de détendre le corps et à la suite de plusieurs séances elle vous aidera à mieux gérer les douleurs au moment des règles. ✨✨
            
            La réflexologie ne substitue pas aux traitements et au suivi médical. C\'est un complément pour trouver un mieux-être face à cette pathologie.',
            'price' => '',
            'category' => '1',
        ],
        [
            'title' => 'Bien-être du dos',
            'description' => 'Vous apprends à soulager votre dos.',
            'price' => '',
            'category' => '3',
        ],
        [
            'title' => 'Mieux digérer',
            'description' => 'Vous donner les bons gestes en cas de digestion difficile.',
            'price' => '',
            'category' => '3',
        ], [
            'title' => 'Mieux dormir',
            'description' => 'Vous donner les bons reflexes afin de mieux dormir.',
            'price' => '',
            'category' => '3',
        ], [
            'title' => 'Anti stress',
            'description' => 'Vous apprendre à prendre du recul.',
            'price' => '',
            'category' => '3',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SESSIONS as $key => $sessionDetails) {
            $session = new Session();
            $session->setTitle($sessionDetails['title']);
            $session->setDescription($sessionDetails['description']);
            $session->setCategory($this->getReference('category_' . $sessionDetails['category']));
            $manager->persist($session);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        [
            'category' => 'projet-client',
            'name' => 'Site statique - HTML et CSS',
            'description' => 'Projet dans le cadre de la formation Développeur web & web mobile à la Wild Code School :
                              Réalisation d\'un site fictif & statique pour un service de bar/restauration
                              Utilisation HTML 5, CSS 3 et JavaScript.
                              Création de la page d\'accueil, formulaires et d\'une galerie photo.',
            'poster' => 'https://zupimages.net/up/21/05/xzhr.png',
            'technology' =>
            [
                'Html',
                'Css',
            ],
            'url' => ' ',
        ],
        [
            'category' => 'projet-client',
            'name' => 'Dumbz : Application d\'antisèche pour développeur',
            'description' => 'Réalisation d\'un site d\'antisèche pour développeur (langage utilisé PHP).
                              Utilisation d\'une architecture MVC, manipulation et création d\'une base de données, gestion des sessions.
                              Création de formulaires, barre de recherche, fiches d\'antisèches en Markdown
                              Utilisation de Bootstrap pour la mise en page.',
            'poster' => 'https://zupimages.net/up/21/05/34wu.png',
            'technology' =>
            [
                'Php',
                'Html',
                'Css',
                'Mysql'
            ],
            'url' => 'http://dumbz.vladsol.ovh/',
        ],
        [
            'category' => 'projet-client',
            'name' => 'Authentic Trip',
            'description' => 'Réalisation d\'une application web (front & back) pour la création de carnets de voyages personnalisés.

                            - Langage PHP
                            - Utilisation du framework Symfony, Doctrine, Bootstrap & Node.js.
                            - Réalisation des wireframes grâce à Figma.
                            - Organisation de l\'équipe suivant la méthodologie Agile & utilisation de Github Projects.',
            'poster' => 'https://zupimages.net/up/21/05/m5kz.png',
            'technology' =>
            [
                'Symfony',
                'Php',
                'Html',
                'Css',
                'Mysql',
            ],
            'url' => 'https://authentic-trip.fr/',
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROJECTS as $projectData) {
            $project = new Project();
            $project->setCategory($this->getReference($projectData['category']));
            $project->setName($projectData['name']);
            $project->setDescription($projectData['description']);
            $project->setPoster($projectData['poster']);
            foreach ($projectData['technology'] as $technology){
                $project->addTechnology($this->getReference($technology));
            }
            $project->setUrl($projectData['url']);
            $manager->persist($project);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TechnologyFixtures::class,
        ];
    }
}

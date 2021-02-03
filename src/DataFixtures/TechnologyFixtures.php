<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture implements DependentFixtureInterface
{
    public const TECHNOLOGY = [
        [
            'name' => 'Php'
        ],
        [
            'name' => 'Javascript'
        ],
        [
            'name' => 'Mysql'
        ],
        [
            'name' => 'Html'
        ],
        [
            'name' => 'Css'
        ],
        [
            'name' => 'Symfony'
        ],
        [
            'name' => 'React'
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::TECHNOLOGY as $technologyData) {
            $technology = new Technology();
            $technology->setName($technologyData['name']);
            $manager->persist($technology);
            $this->addReference($technologyData['name'], $technology);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }

}

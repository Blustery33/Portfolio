<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{
    public const CATEGORY = [
        [
            'name' => 'Projet client',
            'identifier' => 'projet-client',
        ],
        [
            'name' => 'Projet personnel',
            'identifier' => 'projet-personel',
        ]

    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORY as $categoryData) {
            $category = new Category();
            $category->setName($categoryData['name']);
            $category->setIdentifier($categoryData['identifier']);

            $manager->persist($category);
            $this->addReference($categoryData['identifier'], $category);
        }
        $manager->flush();
    }

   /* public function getDependencies()
    {
        return [
          ProjectFixtures::class,
            TechnologyFixtures::class,
        ];
    }*/

}

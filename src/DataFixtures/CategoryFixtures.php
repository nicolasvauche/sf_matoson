<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Consoles')
            ->setImage('consoles.webp');
        $manager->persist($category);
        $this->setReference('categoryConsoles', $category);

        $category = new Category();
        $category->setName('Enceintes')
            ->setImage('enceintes.webp');
        $manager->persist($category);
        $this->setReference('categoryEnceintes', $category);

        $category = new Category();
        $category->setName('Micros & DI')
            ->setImage('micros-di.webp');
        $manager->persist($category);
        $this->setReference('categoryMicros', $category);

        $category = new Category();
        $category->setName('Amplis & Filtres')
            ->setImage('amplis-filtres.webp');
        $manager->persist($category);
        $this->setReference('categoryAmplis', $category);

        $category = new Category();
        $category->setName('Effets')
            ->setImage('effets.webp');
        $manager->persist($category);
        $this->setReference('categoryEffets', $category);

        $category = new Category();
        $category->setName('Câbles')
            ->setImage('cables.webp');
        $manager->persist($category);
        $this->setReference('categoryCables', $category);

        $category = new Category();
        $category->setName('Pieds de micros')
            ->setImage('pieds-de-micros.webp');
        $manager->persist($category);
        $this->setReference('categoryPieds', $category);

        $category = new Category();
        $category->setName('Consommables')
            ->setImage('consommables.webp');
        $manager->persist($category);
        $this->setReference('categoryConsommables', $category);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}

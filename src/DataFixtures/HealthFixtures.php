<?php

namespace App\DataFixtures;

use App\Entity\Health;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HealthFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $health = new Health();
        $health->setName('Bon état')
            ->setImage('bon-etat.png');
        $manager->persist($health);
        $this->setReference('healthBon', $health);

        $health = new Health();
        $health->setName('Abîmé')
            ->setImage('abime.png');
        $manager->persist($health);
        $this->setReference('healthAbime', $health);

        $health = new Health();
        $health->setName('À prévoir')
            ->setImage('a-prevoir.png');
        $manager->persist($health);
        $this->setReference('healthPrevoir', $health);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EquipmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $equipment = new Equipment();
        $equipment->setName('Shure SM57')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}

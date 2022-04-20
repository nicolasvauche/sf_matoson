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
            ->setImage('shure-sm57.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Shure SM58')
            ->setImage('shure-sm58.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Shure Beta 52A')
            ->setImage('shure-beta-52a.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Rode NT5 MP')
            ->setImage('rode-nt5-mp.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('BSS AR133')
            ->setImage('bss-ar133.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Behringer FBQ6200HD')
            ->setImage('behringer-fbq6200hd.webp')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}

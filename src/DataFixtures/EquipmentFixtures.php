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
        $equipment->setName('Soundcraft EFX12')
            ->setImage('soundcraft-efx12.webp')
            ->setDescription('Console de mixage analogique : - 12 préamplis - 2 Line In - 1 Master Out - 1 Aux - 1 FX')
            ->setCategory($this->getReference('categoryConsoles'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Shure SM57')
            ->setImage('shure-sm57.webp')
            ->setDescription('Micro instrument polyvalent avec : - Pince - Adaptateur de réduction de pas de vis 3/8" - Trousse de rangement')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Shure SM58')
            ->setImage('shure-sm58.webp')
            ->setDescription('Micro chant avec : - Pince - Adaptateur de réduction de pas de vis 3/8" - Trousse de rangement')
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
            ->setCategory($this->getReference('categoryEffets'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('the sssnake MC164')
            ->setImage('the-sssnake-mc164.webp')
            ->setCategory($this->getReference('categoryCables'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('the sssnake SM6BK')
            ->setImage('the-sssnake-sm6bk.webp')
            ->setCategory($this->getReference('categoryCables'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('the sssnake SM10BK')
            ->setImage('the-sssnake-sm10bk.webp')
            ->setCategory($this->getReference('categoryCables'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('K&M 210/9 Black')
            ->setImage('k-m-210-9-black.webp')
            ->setCategory($this->getReference('categoryPieds'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('K&M 25950')
            ->setImage('k-m-25950.webp')
            ->setCategory($this->getReference('categoryPieds'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}

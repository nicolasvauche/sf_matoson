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
            ->setDescription("Console de mixage analogique :
                    - 12 préamplis
                    - 2 Line In
                    - 1 Aux
                    - 1 FX")
            ->setCategory($this->getReference('categoryConsoles'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Executive Audio EXB 600A')
            ->setImage('executive-audio-exb-600a.webp')
            ->setDescription('Subwoofer Actif 600W')
            ->setCategory($this->getReference('categoryEnceintes'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        for ($i = 0; $i < 2; $i++) {
            $equipment = new Equipment();
            $equipment->setName('Wharfedale Kinetic 12')
                ->setImage('wharfedale-kinetic-12.webp')
                ->setDescription("Enceinte retour passive 250W
                        - Entrées : Speakon / Jack 6,35mm")
                ->setCategory($this->getReference('categoryEnceintes'))
                ->setHealth($this->getReference('healthBon'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 4; $i++) {
            $equipment = new Equipment();
            $equipment->setName('Shure SM57')
                ->setImage('shure-sm57.webp')
                ->setDescription("Micro instrument polyvalent avec :
                        - Pince
                        - Adaptateur de réduction de pas de vis 3/8\"
                        - Trousse de rangement")
                ->setCategory($this->getReference('categoryMicros'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('Shure SM58')
            ->setImage('shure-sm58.webp')
            ->setDescription("Micro chant avec :
                    - Pince
                    - Adaptateur de réduction de pas de vis 3/8\"
                    - Trousse de rangement")
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        for ($i = 0; $i < 3; $i++) {
            $equipment = new Equipment();
            $equipment->setName('Shure SM58')
                ->setImage('shure-sm58.webp')
                ->setDescription("Micro chant avec :
                        - Pince
                        - Adaptateur de réduction de pas de vis 3/8\"
                        - Trousse de rangement")
                ->setCategory($this->getReference('categoryMicros'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

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

        for ($i = 0; $i < 2; $i++) {
            $equipment = new Equipment();
            $equipment->setName('BSS AR133')
                ->setImage('bss-ar133.webp')
                ->setCategory($this->getReference('categoryMicros'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('Behringer A800')
            ->setImage('behringer-a800.webp')
            ->setDescription("Amplificateur de puissance :
                    - 4Ω : 2x 400W
                    - 8Ω : 2x 220W
                    - 8Ω (bridge) : 1x 800W
    
                Entrées :
                    - 2x XLR
                    - 2x Jack 6,3 mm TRS
                    - 2x RCA
    
                Sorties :
                    - 2 x Speaker Twist
                    - 2x bornier à vis")
            ->setCategory($this->getReference('categoryAmplis'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        for ($i = 0; $i < 2; $i++) {
            $equipment = new Equipment();
            $equipment->setName('Behringer FBQ6200HD')
                ->setImage('behringer-fbq6200hd.webp')
                ->setCategory($this->getReference('categoryAmplis'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 6; $i++) {
            $equipment = new Equipment();
            $equipment->setName('K&M 210/9 Black')
                ->setImage('k-m-210-9-black.webp')
                ->setCategory($this->getReference('categoryPieds'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 5; $i++) {
            $equipment = new Equipment();
            $equipment->setName('K&M 25950')
                ->setImage('k-m-25950.webp')
                ->setCategory($this->getReference('categoryPieds'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('the sssnake MC164')
            ->setImage('the-sssnake-mc164.webp')
            ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
            ->setCategory($this->getReference('categoryCables'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        for ($i = 0; $i < 10; $i++) {
            $equipment = new Equipment();
            $equipment->setName('the sssnake SM6BK')
                ->setImage('the-sssnake-sm6bk.webp')
                ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
                ->setCategory($this->getReference('categoryCables'))
                ->setHealth($this->getReference('healthBon'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 15; $i++) {
            $equipment = new Equipment();
            $equipment->setName('the sssnake SM10BK')
                ->setImage('the-sssnake-sm10bk.webp')
                ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
                ->setCategory($this->getReference('categoryCables'))
                ->setHealth($this->getReference('healthBon'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('Gerband Tape 258 BK')
            ->setImage('gerband-tape-258-bk.webp')
            ->setDescription("Rouleau Gaffer :
                    - Couleur : Noir
                    - Largeur : 50mm
                    - Longueur : 50m")
            ->setCategory($this->getReference('categoryConsommables'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Gerband Tape 258 White')
            ->setImage('gerband-tape-258-white.webp')
            ->setDescription("Rouleau Gaffer :
                    - Couleur : Blanc
                    - Largeur : 50mm
                    - Longueur : 50m")
            ->setCategory($this->getReference('categoryConsommables'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}

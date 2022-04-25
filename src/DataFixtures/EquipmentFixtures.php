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
                ->setPrice('98.00')
                ->setSellerUrl('https://www.thomann.de/fr/shure_sm57_lc.htm')
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
            ->setPrice('98.00')
            ->setSellerUrl('https://www.thomann.de/fr/shure_sm58.htm')
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
                ->setPrice('98.00')
                ->setSellerUrl('https://www.thomann.de/fr/shure_sm58.htm')
                ->setCategory($this->getReference('categoryMicros'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('Shure Beta 52A')
            ->setImage('shure-beta-52a.webp')
            ->setDescription("Micro grosse caisse")
            ->setPrice('168.00')
            ->setSellerUrl('https://www.thomann.de/fr/shure_beta_52.htm')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment->setName('Rode NT5 MP')
            ->setImage('rode-nt5-mp.webp')
            ->setDescription("Paire de micros statiques avec :
                    - 2 pinces micros
                    - 2 bonnettes
                    - 2 adaptateurs
                    - 1 trousse de rangement")
            ->setPrice('289.00')
            ->setSellerUrl('https://www.thomann.de/fr/rode_nt_5.htm')
            ->setCategory($this->getReference('categoryMicros'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        for ($i = 0; $i < 2; $i++) {
            $equipment = new Equipment();
            $equipment->setName('BSS AR133')
                ->setImage('bss-ar133.webp')
                ->setDescription("Boîte de direct active :
                        - Entrée Jack
                        - Link Jack
                        - Sortie XLR")
                ->setPrice('133.00')
                ->setSellerUrl('https://www.thomann.de/fr/bss_ar133.htm')
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
            ->setPrice('229.00')
            ->setSellerUrl('https://www.thomann.de/fr/behringer_a800.htm')
            ->setCategory($this->getReference('categoryAmplis'))
            ->setHealth($this->getReference('healthPrevoir'));
        $manager->persist($equipment);

        for ($i = 0; $i < 2; $i++) {
            $equipment = new Equipment();
            $equipment->setName('Behringer FBQ6200HD')
                ->setImage('behringer-fbq6200hd.webp')
                ->setDescription("Égaliseur graphique :
                        - 2x 31 bandes
                        - 2 entrées XLR / Jack 6,35mm
                        - 2 sorties XLR / Jack 6,35mm
                        - 1 sortie XLR mono")
                ->setPrice('198.00')
                ->setSellerUrl('https://www.thomann.de/fr/behringer_fbq6200hd.htm')
                ->setCategory($this->getReference('categoryAmplis'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 6; $i++) {
            $equipment = new Equipment();
            $equipment->setName('K&M 210/9 Black')
                ->setImage('k-m-210-9-black.webp')
                ->setDescription("Pied perche de microphone :
                        - Hauteur réglable de 900mm à 1600mm
                        - Perche extensible de 460mm à 770mm")
                ->setPrice('53.00')
                ->setSellerUrl('https://www.thomann.de/fr/km_210-9_stativ.htm')
                ->setCategory($this->getReference('categoryPieds'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 5; $i++) {
            $equipment = new Equipment();
            $equipment->setName('K&M 25950')
                ->setImage('k-m-25950.webp')
                ->setDescription("Pied perche de microphone pour ampli de guitare, grosse caisse, … :
                        - Hauteur: 305mm
                        - Perche extensible de 425mm à 725mm")
                ->setPrice('49.00')
                ->setSellerUrl('https://www.thomann.de/fr/km_25950.htm')
                ->setCategory($this->getReference('categoryPieds'))
                ->setHealth($this->getReference('healthPrevoir'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('the sssnake MC164')
            ->setImage('the-sssnake-mc164.webp')
            ->setDescription("Multipaire 16/4 avec Boîtier de scène :
                    - Boîtier de scène : 16 entrées XLR femelles / 4 sorties XLR mâles
                    - Épanoui: 4 XLR femelles - 16 XLR mâles
                    - Longueur 30m")
            ->setPrice('155.00')
            ->setSellerUrl('https://www.thomann.de/fr/the_sssnake_sk415-30_multicore.htm')
            ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
            ->setCategory($this->getReference('categoryCables'))
            ->setHealth($this->getReference('healthBon'));
        $manager->persist($equipment);

        for ($i = 0; $i < 10; $i++) {
            $equipment = new Equipment();
            $equipment->setName('the sssnake SM6BK')
                ->setImage('the-sssnake-sm6bk.webp')
                ->setDescription("Câble micro 6m")
                ->setPrice('5.80')
                ->setSellerUrl('https://www.thomann.de/fr/the_sssnake_sk233-6_mikrokabel.htm')
                ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
                ->setCategory($this->getReference('categoryCables'))
                ->setHealth($this->getReference('healthBon'));
            $manager->persist($equipment);
        }

        for ($i = 0; $i < 15; $i++) {
            $equipment = new Equipment();
            $equipment->setName('the sssnake SM10BK')
                ->setImage('the-sssnake-sm10bk.webp')
                ->setDescription("Câble micro 10m")
                ->setPrice('7.80')
                ->setSellerUrl('https://www.thomann.de/fr/the_sssnake_sm10_bk.htm')
                ->setPurchasedAt(new \DateTime('2022-04-25 15:00:00'))
                ->setCategory($this->getReference('categoryCables'))
                ->setHealth($this->getReference('healthBon'));
            $manager->persist($equipment);
        }

        $equipment = new Equipment();
        $equipment->setName('Gerband Tape 258 BK')
            ->setImage('gerband-tape-258-bk.webp')
            ->setDescription("Gaffer noir :
                    - Largeur : 50mm
                    - Longueur : 50m")
            ->setPrice('9.70')
            ->setSellerUrl('https://www.thomann.de/fr/gerband_gewebeband_258_schwarz.htm')
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
            ->setDescription("Gaffer blanc :
                    - Largeur : 50mm
                    - Longueur : 50m")
            ->setPrice('9.70')
            ->setSellerUrl('https://www.thomann.de/fr/gerband_gewebeband_258_weiss.htm')
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

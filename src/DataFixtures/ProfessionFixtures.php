<?php

namespace App\DataFixtures;

use App\Entity\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture
{
    public const DATA = ['Héro', 'Guerrier', 'Navigateur'];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::DATA as $key => $dataProfession) {
            $profession = new Profession();
            $profession->setProfession($dataProfession);
            $manager->persist($profession);
            $this->addReference('profession_' . $key, $profession);
        }
        $manager->flush();
    }
}

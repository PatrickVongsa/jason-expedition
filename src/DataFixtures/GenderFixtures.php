<?php

namespace App\DataFixtures;

use App\Entity\Gender;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenderFixtures extends Fixture
{
    public const DATA = ['Homme', 'Femme'];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::DATA as $key => $dataGender) {
            $gender = new Gender();
            $gender->setGender($dataGender);
            $manager->persist($gender);
            $this->addReference('gender_' . $key, $gender);
        }
        $manager->flush();
    }
}

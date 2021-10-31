<?php

namespace App\DataFixtures;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture
{
    public const DATA = ['Epée', 'Lance', 'Arc'];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::DATA as $key => $dataWeapon) {
            $weapon = new Weapon();
            $weapon->setWeapon($dataWeapon);
            $manager->persist($weapon);
            $this->addReference('weapon_' . $key, $weapon);
        }
        $manager->flush();
    }
}

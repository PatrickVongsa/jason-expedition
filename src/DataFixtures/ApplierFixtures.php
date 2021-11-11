<?php

namespace App\DataFixtures;

use App\Entity\Applier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ApplierFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $gender = $this->getReference('gender_' . rand(0, 1));
        if($gender == $this->getReference('gender_0')){
            $genderName = 'male';
        }else {
            $genderName = 'female';
        }
            $applier = new Applier();
            $applier
                ->setFirstname($this->faker->firstName($genderName))
                ->setLastname($this->faker->lastName())
                ->setAge($this->faker->numberBetween(15, 28))
                ->setGender($gender)
                ->setHeight($this->faker->numberBetween(180, 210))
                ->setOrigin('Grèce')
                ->setProfession($this->getReference('profession_0'))
                ->setWarriorSkill($this->getReference('experience_' . rand(3, 4)))
                ->setWeapon($this->getReference('weapon_' . rand(0, 2)))
                ->setNavigationSkill($this->getReference('experience_' . rand(2, 4)));
            $manager->persist($applier);
        }

        for ($i = 0; $i < 140; $i++) {
            $gender = $this->getReference('gender_' . rand(0, 1));
            if($gender == $this->getReference('gender_0')){
                $genderName = 'male';
            }else {
                $genderName = 'female';
            }
            $applier = new Applier();
            $applier
                ->setFirstname($this->faker->firstName($genderName))
                ->setLastname($this->faker->lastName())
                ->setAge($this->faker->numberBetween(15, 28))
                ->setGender($gender)
                ->setHeight($this->faker->numberBetween(150, 210))
                ->setOrigin('Grèce')
                ->setProfession($this->getReference('profession_' . rand(1, 2)))
                ->setWarriorSkill($this->getReference('experience_' . rand(0, 4)))
                ->setWeapon($this->getReference('weapon_' . rand(0, 2)))
                ->setNavigationSkill($this->getReference('experience_' . rand(0, 4)));
            $manager->persist($applier);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            ExperienceFixtures::class,
            GenderFixtures::class,
            ProfessionFixtures::class,
            WeaponFixtures::class,
        ];
    }
}

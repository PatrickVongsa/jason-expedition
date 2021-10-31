<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixtures extends Fixture
{
    public const DATA = ['Aucune', 'Amateur', 'Autonome', 'Confirmé', 'Expert'];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $key => $dataExperience) {
            $experience = new Experience();
            $experience->setExperience($dataExperience);
            $manager->persist($experience);
            $this->addReference('experience_' . $key, $experience);
        }
        $manager->flush();
    }
}

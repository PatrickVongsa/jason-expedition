<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user
            ->setEmail('jason@mail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->hashPassword($user, 'admin1234'));
        $manager->persist($user);

        $manager->flush();
    }
}

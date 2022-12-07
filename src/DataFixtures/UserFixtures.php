<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user_rolea = new User();
        $user_rolea->setEmail('szelkaandrzej@gmail.com');
        $user_rolea->setRoles(['ROLE_ADMIN']);
        $user_rolea->setFirstName('Andrzej');
        $user_rolea->setLastName('Szelka');
        $user_rolea->setActive(true);
        $user_rolea->setOwner($this->getReference(AAOwnerFixtures::OWNER_REFERENCE));
        $password = $this->hasher->hashPassword($user_rolea, 'qwe123');
        $user_rolea->setPassword($password);
        $manager->persist($user_rolea);

        $user_roleu = new User();
        $user_roleu->setEmail('andrzej.szelka@wp.pl');
        $user_roleu->setRoles(['ROLE_USER']);
        $user_roleu->setFirstName('Andrzej');
        $user_roleu->setLastName('Szelka');
        $user_roleu->setActive(true);
        $user_roleu->setOwner($this->getReference(AAOwnerFixtures::OWNER_REFERENCE));
        $password = $this->hasher->hashPassword($user_roleu, 'qwe123');
        $user_roleu->setPassword($password);
        $manager->persist($user_roleu);

        $manager->flush();
    }
}

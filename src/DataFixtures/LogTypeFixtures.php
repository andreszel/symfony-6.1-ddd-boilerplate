<?php

namespace App\DataFixtures;

use App\Entity\LogType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LogTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $logTypeOne = new LogType();
        $logTypeOne->setName('Logowanie użytkownika na konto');
        $manager->persist($logTypeOne);

        $logTypeTwo = new LogType();
        $logTypeTwo->setName('Wylogowanie użytkownika z konta');
        $manager->persist($logTypeTwo);

        $manager->flush();
    }
}

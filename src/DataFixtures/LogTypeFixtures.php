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
        $logTypeOne->setIsLogin(true);
        $logTypeOne->setIsLogout(false);
        $manager->persist($logTypeOne);

        $logTypeTwo = new LogType();
        $logTypeTwo->setName('Wylogowanie użytkownika z konta');
        $logTypeTwo->setIsLogin(false);
        $logTypeTwo->setIsLogout(true);
        $manager->persist($logTypeTwo);

        $manager->flush();
    }
}

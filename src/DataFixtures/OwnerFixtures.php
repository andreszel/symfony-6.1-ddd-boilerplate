<?php

namespace App\DataFixtures;

use App\Entity\Owner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OwnerFixtures extends Fixture
{
    public const OWNER_REFERENCE = 'owner';

    public function load(ObjectManager $manager): void
    {
        $owner = new Owner();
        $owner->setName("Pierwszy właściciel - jedyny całego systemu.");
        $manager->persist($owner);

        $manager->flush();

        $this->addReference(self::OWNER_REFERENCE, $owner);
    }
}

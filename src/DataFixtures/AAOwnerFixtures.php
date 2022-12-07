<?php

namespace App\DataFixtures;

use App\Entity\Owner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AAOwnerFixtures extends Fixture
{
    public const OWNER_REFERENCE = 'owner_one';

    public function load(ObjectManager $manager): void
    {
        $owner = new Owner();
        $owner->setName("Karol Nowak");
        $manager->persist($owner);

        $manager->flush();

        $this->addReference(self::OWNER_REFERENCE, $owner);
    }
}

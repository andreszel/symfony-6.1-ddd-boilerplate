<?php

namespace App\DataFixtures;

use App\Entity\Province;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ACProvinceFixtures extends Fixture
{
    public const PROVINCE_LODZIE_REFERENCE = 'province_lodzkie';
    public const PROVINCE_MAZOWIECKIE_REFERENCE = 'province_mazowiecki';
    public const PROVINCE_BERLIN_REFERENCE = 'province_berlin';

    public function load(ObjectManager $manager)
    {
        $province_lodzkie = new Province();
        $province_lodzkie->setName('łódzkie');
        $province_lodzkie->setSlug('lodzkie');
        $province_lodzkie->setCountry($this->getReference(ABCountryFixtures::COUNTRY_PL_REFERENCE));
        $manager->persist($province_lodzkie);

        $province_mazowieckie = new Province();
        $province_mazowieckie->setName('mazowieckie');
        $province_mazowieckie->setSlug('mazowieckie');
        $province_mazowieckie->setCountry($this->getReference(ABCountryFixtures::COUNTRY_PL_REFERENCE));
        $manager->persist($province_mazowieckie);

        $province_berlin = new Province();
        $province_berlin->setName('berlin');
        $province_berlin->setSlug('berlin');
        $province_berlin->setCountry($this->getReference(ABCountryFixtures::COUNTRY_DE_REFERENCE));
        $manager->persist($province_berlin);

        $manager->flush();

        $this->addReference(self::PROVINCE_LODZIE_REFERENCE, $province_lodzkie);
        $this->addReference(self::PROVINCE_MAZOWIECKIE_REFERENCE, $province_mazowieckie);
        $this->addReference(self::PROVINCE_BERLIN_REFERENCE, $province_berlin);
    }
}

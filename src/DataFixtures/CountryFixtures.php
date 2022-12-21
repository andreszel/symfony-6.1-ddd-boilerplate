<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public const COUNTRY_PL_REFERENCE = 'country_pl';
    public const COUNTRY_DE_REFERENCE = 'country_de';

    public function load(ObjectManager $manager)
    {
        $country_pl = new Country();
        $country_pl->setName('Polska');
        $country_pl->setLangCode('pl_PL');
        $manager->persist($country_pl);

        $country_de = new Country();
        $country_de->setName('Niemcy');
        $country_de->setLangCode('de_DE');
        $manager->persist($country_de);

        $manager->flush();

        $this->addReference(self::COUNTRY_PL_REFERENCE, $country_pl);
        $this->addReference(self::COUNTRY_DE_REFERENCE, $country_de);
    }

    /* public function countryProvider()
    {
        yield ['Polska', 'pl_PL'];
        yield ['Niemcy', 'de_DE'];
    } */
}

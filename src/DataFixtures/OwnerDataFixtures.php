<?php

namespace App\DataFixtures;

use App\Entity\OwnerData;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OwnerDataFixtures extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $ownerData1 = new OwnerData();
        $ownerData1->setName('Nazwa danych 1');
        $ownerData1->setFirstName('Andrzej');
        $ownerData1->setLastName('Szelka');
        $ownerData1->setAddress('ul. Św. Antoniego 28/2');
        $ownerData1->setPostCode('97-200');
        $ownerData1->setCity('Tomaszów Mazowiecki');
        $ownerData1->setProvince('łódzkie');
        $ownerData1->setNip('773-231-15-598');
        $ownerData1->setRegon('regon');
        $ownerData1->setPhone1('+48 605645205');
        $ownerData1->setPhone2('+48 605645206');
        $ownerData1->setEmail('szelkaandrzej@gmail.com');
        $ownerData1->setDataTypeId($this->getReference(DataTypeFixtures::TYPE_1_REFERENCE));
        $ownerData1->setOwnerId($this->getReference(OwnerFixtures::OWNER_REFERENCE));
        $manager->persist($ownerData1);

        $manager->flush();

        $ownerData2 = new OwnerData();
        $ownerData2->setName('Nazwa danych 1');
        $ownerData2->setFirstName('Andrzej');
        $ownerData2->setLastName('Szelka');
        $ownerData2->setAddress('ul. Św. Antoniego 28/2');
        $ownerData2->setPostCode('97-200');
        $ownerData2->setCity('Tomaszów Mazowiecki');
        $ownerData2->setProvince('łódzkie');
        $ownerData2->setNip('773-231-15-598');
        $ownerData2->setRegon('regon');
        $ownerData2->setPhone1('+48 605645205');
        $ownerData2->setPhone2('+48 605645206');
        $ownerData2->setEmail('szelkaandrzej@gmail.com');
        $ownerData2->setDataTypeId($this->getReference(DataTypeFixtures::TYPE_2_REFERENCE));
        $ownerData2->setOwnerId($this->getReference(OwnerFixtures::OWNER_REFERENCE));
        $manager->persist($ownerData2);

        $manager->flush();

        $ownerData3 = new OwnerData();
        $ownerData3->setName('Nazwa danych 1');
        $ownerData3->setFirstName('Andrzej');
        $ownerData3->setLastName('Szelka');
        $ownerData3->setAddress('ul. Św. Antoniego 28/2');
        $ownerData3->setPostCode('97-200');
        $ownerData3->setCity('Tomaszów Mazowiecki');
        $ownerData3->setProvince('łódzkie');
        $ownerData3->setNip('773-231-15-598');
        $ownerData3->setRegon('regon');
        $ownerData3->setPhone1('+48 605645205');
        $ownerData3->setPhone2('+48 605645206');
        $ownerData3->setEmail('szelkaandrzej@gmail.com');
        $ownerData3->setDataTypeId($this->getReference(DataTypeFixtures::TYPE_3_REFERENCE));
        $ownerData3->setOwnerId($this->getReference(OwnerFixtures::OWNER_REFERENCE));
        $manager->persist($ownerData3);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DataTypeFixtures::class,
            OwnerFixtures::class
        ];
    }
}

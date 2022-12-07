<?php

namespace App\DataFixtures;

use App\Entity\OwnerData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OwnerDataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $phones = ['contact1' => '+48 605 645 205', 'contact2' => '+48 606 646 206'];

        $ownerData1 = new OwnerData();
        $ownerData1->setName('Dane kontaktowe');
        $ownerData1->setFirstName('Andrzej');
        $ownerData1->setLastName('Szelka');
        $ownerData1->setAddress('ul. Św. Antoniego 28/2');
        $ownerData1->setPostCode('97-200');
        $ownerData1->setCity('Tomaszów Mazowiecki');
        $ownerData1->setProvince($this->getReference(ACProvinceFixtures::PROVINCE_LODZIE_REFERENCE));
        $ownerData1->setNip('773-231-15-598');
        $ownerData1->setRegon('regon');
        $ownerData1->setEmail('szelkaandrzej@gmail.com');
        $ownerData1->setPhone($phones);
        $ownerData1->setOwner($this->getReference(AAOwnerFixtures::OWNER_REFERENCE));
        $ownerData1->setDataType($this->getReference(DataTypeFixtures::TYPE_DATA_CONTACT_REFERENCE));
        $manager->persist($ownerData1);

        $ownerData2 = new OwnerData();
        $ownerData2->setName('Dane do FV');
        $ownerData2->setFirstName('Andrzej');
        $ownerData2->setLastName('Szelka');
        $ownerData2->setAddress('ul. Św. Antoniego 28/2');
        $ownerData2->setPostCode('97-200');
        $ownerData2->setCity('Tomaszów Mazowiecki');
        $ownerData2->setProvince($this->getReference(ACProvinceFixtures::PROVINCE_LODZIE_REFERENCE));
        $ownerData2->setNip('773-231-15-598');
        $ownerData2->setRegon('regon');
        $ownerData2->setEmail('szelkaandrzej@gmail.com');
        $ownerData2->setPhone($phones);
        $ownerData2->setOwner($this->getReference(AAOwnerFixtures::OWNER_REFERENCE));
        $ownerData2->setDataType($this->getReference(DataTypeFixtures::TYPE_DATA_INVOICE_REFERENCE));
        $manager->persist($ownerData2);

        $ownerData3 = new OwnerData();
        $ownerData3->setName('Kontakt techniczny');
        $ownerData3->setFirstName('Andrzej');
        $ownerData3->setLastName('Szelka');
        $ownerData3->setAddress('ul. Św. Antoniego 28/2');
        $ownerData3->setPostCode('97-200');
        $ownerData3->setCity('Tomaszów Mazowiecki');
        $ownerData3->setProvince($this->getReference(ACProvinceFixtures::PROVINCE_MAZOWIECKIE_REFERENCE));
        $ownerData3->setNip('773-231-15-598');
        $ownerData3->setRegon('regon');
        $ownerData3->setEmail('szelkaandrzej@gmail.com');
        $ownerData3->setPhone($phones);
        $ownerData3->setOwner($this->getReference(AAOwnerFixtures::OWNER_REFERENCE));
        $ownerData3->setDataType($this->getReference(DataTypeFixtures::TYPE_DATA_TECHNICAL_REFERENCE));
        $manager->persist($ownerData3);

        $manager->flush();
    }
}

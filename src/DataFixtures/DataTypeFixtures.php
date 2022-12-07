<?php

namespace App\DataFixtures;

use App\Entity\DataType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataTypeFixtures extends Fixture
{
    public const TYPE_DATA_CONTACT_REFERENCE = 'type_data_contact';
    public const TYPE_DATA_INVOICE_REFERENCE = 'type_data_invoice';
    public const TYPE_DATA_TECHNICAL_REFERENCE = 'type_data_technical';

    public function load(ObjectManager $manager): void
    {
        $dataType1 = new DataType();
        $dataType1->setName('Dane kontaktowe');
        $manager->persist($dataType1);

        $dataType2 = new DataType();
        $dataType2->setName('Dane do faktury');
        $manager->persist($dataType2);

        $dataType3 = new DataType();
        $dataType3->setName('Dane techniczne');
        $manager->persist($dataType3);

        $manager->flush();

        $this->addReference(self::TYPE_DATA_CONTACT_REFERENCE, $dataType1);
        $this->addReference(self::TYPE_DATA_INVOICE_REFERENCE, $dataType2);
        $this->addReference(self::TYPE_DATA_TECHNICAL_REFERENCE, $dataType3);
    }
}

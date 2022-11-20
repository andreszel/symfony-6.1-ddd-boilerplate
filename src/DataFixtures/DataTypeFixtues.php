<?php

namespace App\DataFixtures;

use App\Entity\DataType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataTypeFixtures extends Fixture
{
    public const TYPE_1_REFERENCE = 'type_1';
    public const TYPE_2_REFERENCE = 'type_2';
    public const TYPE_3_REFERENCE = 'type_3';

    public function load(ObjectManager $manager): void
    {
        $dataType1 = new DataType();
        $dataType1->setName('Dane kontaktowe');
        $manager->persist($dataType1);

        $manager->flush();

        $dataType2 = new DataType();
        $dataType2->setName('Dane do faktury');
        $manager->persist($dataType2);

        $manager->flush();

        $dataType3 = new DataType();
        $dataType3->setName('Dane techniczne');
        $manager->persist($dataType3);

        $manager->flush();

        $this->addReference(self::TYPE_1_REFERENCE, $dataType1);
        $this->addReference(self::TYPE_2_REFERENCE, $dataType2);
        $this->addReference(self::TYPE_3_REFERENCE, $dataType3);
    }
}

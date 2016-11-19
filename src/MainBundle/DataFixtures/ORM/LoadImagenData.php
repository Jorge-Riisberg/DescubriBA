<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Imagen;

class LoadImagenData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $iCentinela = new Imagen();
        $iCentinela->setNombre('centinela.jpg');
        $iCentinela->setPuntodeinteres($this->getReference('Centinela'));
        $iCentinela->setFechaHora();
        $manager->persist($iCentinela);   

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }    
}

<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Enlace;

class LoadEnlaceData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $eCentinela = new Enlace();
        $eCentinela->setNombre('Complejo Cerro El Centinela');
        $eCentinela->setEnlace('http://www.cerroelcentinela.com.ar/');
        $eCentinela->setPuntodeinteres($this->getReference('Centinela'));
        $manager->persist($eCentinela);   

        $manager->flush();

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }    
}

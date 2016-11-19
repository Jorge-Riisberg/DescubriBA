<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Video;

class LoadVideoData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $vCentinela = new Video();
        $vCentinela->setNombre('Aerosilla');
        $vCentinela->setEnlace('https://www.youtube.com/embed/bAMw_4QBYOE');
        $vCentinela->setPuntodeinteres($this->getReference('Centinela'));
        $manager->persist($vCentinela);   

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }    
}

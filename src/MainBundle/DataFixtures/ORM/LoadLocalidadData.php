<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Localidad;

class LoadLocalidadData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Tandil = new Localidad();
        $Tandil->setNombre('Tandil');
        $manager->persist($Tandil);

        $TresArroyos = new Localidad();
        $TresArroyos->setNombre('Tres Arroyos');
        $manager->persist($TresArroyos);

        $MarDelPlata = new Localidad();
        $MarDelPlata->setNombre('Mar Del Plata');
        $manager->persist($MarDelPlata);

        $LaPlata = new Localidad();
        $LaPlata->setNombre('La Plata');
        $manager->persist($LaPlata); 

        $BahiaBlanca = new Localidad();
        $BahiaBlanca->setNombre('Bahia Blanca');
        $manager->persist($BahiaBlanca);                           

        $BuenosAires = new Localidad();
        $BuenosAires->setNombre('Buenos Aires');
        $manager->persist($BuenosAires);

        $Junin = new Localidad();
        $Junin->setNombre('Junin');
        $manager->persist($Junin);                           

        $Necochea = new Localidad();
        $Necochea->setNombre('Necochea');
        $manager->persist($Necochea);

        $Carhue = new Localidad();
        $Carhue->setNombre('Carhué');
        $manager->persist($Carhue);                     

        $manager->flush();

        $this->addReference('Tandil', $Tandil);
        $this->addReference('TresArroyos', $TresArroyos);
        $this->addReference('MarDelPlata', $MarDelPlata);
        $this->addReference('LaPlata', $LaPlata);
        $this->addReference('BahiaBlanca', $BahiaBlanca);
        $this->addReference('BuenosAires', $BuenosAires);
        $this->addReference('Junin', $Junin);
        $this->addReference('Necochea', $Necochea);
        $this->addReference('Carhue', $Carhue);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }    
}

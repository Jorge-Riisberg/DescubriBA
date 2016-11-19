<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Categoria;

class LoadCategoriaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Cerro = new Categoria();
        $Cerro->setNombre('Cerro');
        $manager->persist($Cerro);

        $Estadio = new Categoria();
        $Estadio->setNombre('Estadio');
        $manager->persist($Estadio);

        $Plaza = new Categoria();
        $Plaza->setNombre('Plaza');
        $manager->persist($Plaza);

        $Playa = new Categoria();
        $Playa->setNombre('Playa');
        $manager->persist($Playa);                           

        $Escultura = new Categoria();
        $Escultura->setNombre('Escultura');
        $manager->persist($Escultura);

        $Teatro = new Categoria();
        $Teatro->setNombre('Teatro');
        $manager->persist($Teatro);

        $Paseo = new Categoria();
        $Paseo->setNombre('Paseo');
        $manager->persist($Paseo);

        $Museo = new Categoria();
        $Museo->setNombre('Museo');
        $manager->persist($Museo); 

        $manager->flush();

        $this->addReference('Cerro', $Cerro);
        $this->addReference('Estadio', $Estadio);
        $this->addReference('Plaza', $Plaza);
        $this->addReference('Playa', $Playa);
        $this->addReference('Escultura', $Escultura);
        $this->addReference('Teatro', $Teatro);
        $this->addReference('Paseo', $Paseo);
        $this->addReference('Museo', $Museo);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }    
}

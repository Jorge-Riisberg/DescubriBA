<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Puntodeinteres;

class LoadPuntoDeInteresData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        //Cerro Centinela Tandil
        $Centinela = new Puntodeinteres();
        $Centinela->setNombre('Cerro Centinela');
        $Centinela->setDescripcion('El cerro El Centinela, a 5 km de la ciudad de Tandil, provincia de Buenos Aires, Argentina; se eleva 298 msnm,
                                    y lleva ese nombre por la silueta rocosa que lo corona.');
		$Centinela->setLatitud('-37.355662');
		$Centinela->setLongitud('-59.171802');
        $Centinela->setLocalidad($this->getReference('Tandil'));
        $Centinela->addCategoria($this->getReference('Cerro'));
        $manager->persist($Centinela);


        //Plaza San Matin Tres Arroyos
        $SanMartin = new Puntodeinteres();
        $SanMartin->setNombre('Plaza San Martin');
        $SanMartin->setDescripcion('Centro, nodo de la ciudad, es ideal para empezar a conocer la localidad desde este punto. Con un trazado particular, 
        	                        y con una forestación admirable, tiene en su parte central al Monumento al General Don José de San Martín, 
        	                        inaugurado el 24 de Abril de 1952 (en concordancia con el 68º Aniversario de la Fundación de Tres Arroyos).');
		$SanMartin->setLatitud('-38.377023');
		$SanMartin->setLongitud('-60.275621');
        $SanMartin->setLocalidad($this->getReference('TresArroyos'));
        $SanMartin->addCategoria($this->getReference('Plaza'));
        $manager->persist($SanMartin);


        // Playa Punta Mogotes Mar Del Plata
        $PuntaMogotes = new Puntodeinteres();
        $PuntaMogotes->setNombre('Punta Mogotes');
        $PuntaMogotes->setDescripcion('Punta Mogotes es un accidente geográfico y un complejo costanero formado por un conjunto de balnearios ubicados 
        	                           en las playas situadas al sur del puerto de Mar del Plata');
		$PuntaMogotes->setLatitud('-38.066825');
		$PuntaMogotes->setLongitud('-57.543583');
        $PuntaMogotes->setLocalidad($this->getReference('MarDelPlata'));
        $PuntaMogotes->addCategoria($this->getReference('Playa'));
        $manager->persist($PuntaMogotes);


        //Museo Alsina Carhué
        $MuseoAlsina = new Puntodeinteres();
        $MuseoAlsina->setNombre('Museo Alsina');
        $MuseoAlsina->setDescripcion('Fue fundado en 1963 por una inquietud del Rotary Club y de un grupo de vecinos aficionados a la historia.
                                      Su edificio está ubicado en Rivadavia 1195 y fue completamente refaccionado en 2010.');
		$MuseoAlsina->setLatitud('-37.181030');
		$MuseoAlsina->setLongitud('-62.761769');
        $MuseoAlsina->setLocalidad($this->getReference('Carhue'));
        $MuseoAlsina->addCategoria($this->getReference('Museo'));
        $manager->persist($MuseoAlsina);


        //Estadio Monumental Buenos Aires
        $Monumental = new Puntodeinteres();
        $Monumental->setNombre('Monumental');
        $Monumental->setDescripcion('El Estadio Antonio Vespucio Liberti, también conocido mundialmente como Estadio Monumental, 
        	                         es un estadio olímpico de propiedad del Club Atlético River Plate');
		$Monumental->setLatitud('-34.545395');
		$Monumental->setLongitud('-58.450022');
        $Monumental->setLocalidad($this->getReference('BuenosAires'));
        $Monumental->addCategoria($this->getReference('Estadio'));
        $manager->persist($Monumental);


        //Estadio Único La Plata
        $Unico = new Puntodeinteres();
        $Unico->setNombre('Único');
        $Unico->setDescripcion('Ubicado en La Plata, provincia de Buenos Aires, Argentina. También se lo conoce popularmente con el nombre anterior de Estadio Único 
        	                    y es propiedad de la Provincia de Buenos Aires, administrado en conjunto por el Gobierno provincial, 
        	                    la Municipalidad de La Plata y los clubes Estudiantes y Gimnasia');
		$Unico->setLatitud('-34.913802');
		$Unico->setLongitud('-57.988785');
        $Unico->setLocalidad($this->getReference('LaPlata'));
        $Unico->addCategoria($this->getReference('Estadio'));
        $manager->persist($Unico);


        $manager->flush();

        $this->addReference('Centinela', $Centinela);
        $this->addReference('SanMartin', $SanMartin);
        $this->addReference('PuntaMogotes', $PuntaMogotes);
        $this->addReference('MuseoAlsina', $MuseoAlsina);
        $this->addReference('Monumental', $Monumental);
        $this->addReference('Unico', $Unico);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }    
}

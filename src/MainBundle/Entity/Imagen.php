<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Imagen
 */
class Imagen
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Puntodeinteres
     */
    private $puntodeinteres;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File
     */
    private $imagen;

    /**
     * @var \DateTime
     */
    private $fechaHora;

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Imagen
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set puntodeinteres
     *
     * @param \MainBundle\Entity\Puntodeinteres $puntodeinteres
     * @return Imagen
     */
    public function setPuntodeinteres(\MainBundle\Entity\Puntodeinteres $puntodeinteres = null)
    {
        $this->puntodeinteres = $puntodeinteres;

        return $this;
    }

    /**
     * Get puntodeinteres
     *
     * @return \MainBundle\Entity\Puntodeinteres 
     */
    public function getPuntodeinteres()
    {
        return $this->puntodeinteres;
    }

    public function __toString() {
    	return $this->nombre;
	}


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImagen(File $image = null)
    {
        $this->imagen = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->fechaHora = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImagen()
    {
        return $this->imagen;
    }


    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    public function setFechaHora()
    {
        // WILL be saved in the database
        $this->fechaHora = new \DateTime("now");
    }    

}

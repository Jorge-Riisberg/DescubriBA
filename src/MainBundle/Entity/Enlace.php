<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enlace
 */
class Enlace
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $enlace;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Puntodeinteres
     */
    private $puntodeinteres;

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Enlace
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
     * Set enlace
     *
     * @param string $enlace
     * @return Enlace
     */
    public function setEnlace($enlace)
    {
        $this->enlace = $enlace;

        return $this;
    }

    /**
     * Get enlace
     *
     * @return string 
     */
    public function getEnlace()
    {
        return $this->enlace;
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
     * @return Enlace
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

}

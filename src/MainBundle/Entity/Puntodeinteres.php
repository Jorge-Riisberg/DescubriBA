<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puntodeinteres
 */
class Puntodeinteres
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $latitud;

    /**
     * @var string
     */
    private $longitud;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Localidad
     */
    private $localidad;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categorias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $imagenes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $videos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $enlaces;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Puntodeinteres
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Puntodeinteres
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Puntodeinteres
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Puntodeinteres
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
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
     * Set localidad
     *
     * @param \MainBundle\Entity\Localidad $localidad
     * @return Puntodeinteres
     */
    public function setLocalidad(\MainBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \MainBundle\Entity\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Add categoria
     *
     * @param \MainBundle\Entity\Categoria $categoria
     * @return Puntodeinteres
     */
    public function addCategoria(\MainBundle\Entity\Categoria $categoria)
    {
        $this->categorias[] = $categoria;

        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \MainBundle\Entity\Categoria $categoria
     */
    public function removeCategoria(\MainBundle\Entity\Categoria $categoria)
    {
        $this->categorias->removeElement($categoria);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Add imagen
     *
     * @param \MainBundle\Entity\Imagen $imagen
     * @return Puntodeinteres
     */
    public function addImagen(\MainBundle\Entity\Imagen $imagen)
    {
        $this->imagenes[] = $imagen;

        return $this;
    }

    /**
     * Remove imagen
     *
     * @param \MainBundle\Entity\Imagen $imagen
     */
    public function removeImagen(\MainBundle\Entity\Imagen $imagen)
    {
        $this->imagenes->removeElement($imagen);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Add video
     *
     * @param \MainBundle\Entity\Video $video
     * @return Puntodeinteres
     */
    public function addVideo(\MainBundle\Entity\Video $video)
    {
        $this->videos[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \MainBundle\Entity\Video $video
     */
    public function removeVideo(\MainBundle\Entity\Video $video)
    {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos()
    {
        return $this->videos;
    }    

    /**
     * Add enlace
     *
     * @param \MainBundle\Entity\Enlace $enlace
     * @return Puntodeinteres
     */
    public function addEnlace(\MainBundle\Entity\Enlace $enlace)
    {
        $this->enlaces[] = $enlace;

        return $this;
    }

    /**
     * Remove enlace
     *
     * @param \MainBundle\Entity\Enlace $enlace
     */
    public function removeEnlace(\MainBundle\Entity\Enlace $enlace)
    {
        $this->enlaces->removeElement($enlace);
    }

    /**
     * Get enlaces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnlaces()
    {
        return $this->enlaces;
    }

    public function __toString() {
        return $this->nombre;
    }    
}

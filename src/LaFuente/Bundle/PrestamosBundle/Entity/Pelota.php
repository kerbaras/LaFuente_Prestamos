<?php

namespace LaFuente\Bundle\PrestamosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelota
 *
 * @ORM\Table(name="productos_pelotas")
 * @ORM\Entity(repositoryClass="LaFuente\Bundle\PrestamosBundle\Entity\PelotaRepository")
 */
class Pelota extends Product
{
    /**
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=31)
     */
    protected $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=31)
     */
    protected $color;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=63)
     */
    protected $estado;


    public function __toString()
    {
        return 'Pelota ' . $this->identifier . ' (' . $this->color . ')';
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return Pelota
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string 
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Pelota
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Pelota
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

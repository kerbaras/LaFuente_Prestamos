<?php

namespace LaFuente\Bundle\PrestamosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mate
 *
 * @ORM\Table(name="productos_mates")
 * @ORM\Entity(repositoryClass="LaFuente\Bundle\PrestamosBundle\Entity\MateRepository")
 */
class Mate extends Product
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="bombilla", type="boolean")
     */
    protected $bombilla;

    /**
     * @ORM\OneToOne(targetEntity="Termo", inversedBy="mate")
     * @ORM\JoinColumn(name="termo_id", referencedColumnName="id")
     **/
    protected $termo;


    public function __toString()
    {
        return 'Mate ' . $this->getTermo()->getNumero();
    }

    /**
     * Set bombilla
     *
     * @param boolean $bombilla
     * @return Mate
     */
    public function setBombilla($bombilla)
    {
        $this->bombilla = $bombilla;

        return $this;
    }

    /**
     * Get bombilla
     *
     * @return boolean 
     */
    public function getBombilla()
    {
        return $this->bombilla;
    }

    /**
     * Set termo
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\Termo $termo
     * @return Mate
     */
    public function setTermo(\LaFuente\Bundle\PrestamosBundle\Entity\Termo $termo = null)
    {
        $this->termo = $termo;

        return $this;
    }

    /**
     * Get termo
     *
     * @return \LaFuente\Bundle\PrestamosBundle\Entity\Termo 
     */
    public function getTermo()
    {
        return $this->termo;
    }
}

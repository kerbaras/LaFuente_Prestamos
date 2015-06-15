<?php

namespace LaFuente\Bundle\PrestamosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Termo
 *
 * @ORM\Table(name="productos_termos")
 * @ORM\Entity(repositoryClass="LaFuente\Bundle\PrestamosBundle\Entity\TermoRepository")
 */
class Termo extends Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="smallint")
     */
    protected $numero;

    /**
     * @ORM\OneToOne(targetEntity="Mate", mappedBy="termo")
     **/
    protected $mate;


    public function __toString()
    {
        return 'Termo ' . $this->numero;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Termo
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set mate
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\Mate $mate
     * @return Termo
     */
    public function setMate(\LaFuente\Bundle\PrestamosBundle\Entity\Mate $mate = null)
    {
        $this->mate = $mate;

        return $this;
    }

    /**
     * Get mate
     *
     * @return \LaFuente\Bundle\PrestamosBundle\Entity\Mate 
     */
    public function getMate()
    {
        return $this->mate;
    }
}

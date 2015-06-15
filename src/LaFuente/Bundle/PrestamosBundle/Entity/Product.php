<?php

namespace LaFuente\Bundle\PrestamosBundle\Entity;

use LaFuente\Bundle\PrestamosBundle\Model\ProductInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="LaFuente\Bundle\PrestamosBundle\Entity\ProductRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"product" = "Product", "termo" = "Termo", "mate" = "Mate", "pelota" = "Pelota", "raqueta" = "Raqueta"})
 */
abstract class Product implements ProductInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="PrestamoProducto", mappedBy="product")
     **/
    protected $prestamos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="availability", type="boolean")
     */
    protected $availability;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text")
     */
    protected $notes;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prestamos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->availability = true;
    }

    public function isAvailable()
    {
        return $this->availability;
    }

    public function __toString()
    {
        return 'Producto ' . $this->id;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set availability
     *
     * @param boolean $availability
     * @return Product
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return boolean 
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Product
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add prestamos
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\PrestamoProducto $prestamos
     * @return Product
     */
    public function addPrestamo(\LaFuente\Bundle\PrestamosBundle\Entity\PrestamoProducto $prestamos)
    {
        $this->prestamos[] = $prestamos;

        return $this;
    }

    /**
     * Remove prestamos
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\PrestamoProducto $prestamos
     */
    public function removePrestamo(\LaFuente\Bundle\PrestamosBundle\Entity\PrestamoProducto $prestamos)
    {
        $this->prestamos->removeElement($prestamos);
    }

    /**
     * Get prestamos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrestamos()
    {
        return $this->prestamos;
    }
}

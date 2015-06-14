<?php

namespace LaFuente\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use LaFuente\Bundle\PrestamosBundle\Entity\Prestamo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="LaFuente\Bundle\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    protected $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="dniTipo", type="string", length=255)
     */
    protected $dniTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="dniNumero", type="string", length=255, unique=true)
     */
    protected $dniNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=255)
     */
    protected $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=255, nullable=true)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(name="imageType", type="string", length=64, nullable=true)
     */
    protected $imageType;

    /**
     * @ORM\OneToMany(targetEntity="LaFuente\Bundle\PrestamosBundle\Entity\Prestamo", mappedBy="usuario")
     **/
    protected $prestamos;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->prestamos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function setImageBlob(File $file)
    {
        if (!$file){
            $this->setImage(null);
            $this->setImageType(null);
            return $this;
        }

        if(!$file->isValid()){
            throw new FileException("Invalid File");
        }

        $imageFile    = fopen($file->getRealPath(), 'r');
        $imageContent = fread($imageFile, $file->getClientSize());
        fclose($imageFile);
        $this->setImage($imageContent);
        $this->setImageType($file->getMimeType());
        return $this;
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
     * Set nombre
     *
     * @param string $nombre
     * @return User
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
     * Set apellido
     *
     * @param string $apellido
     * @return User
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dniTipo
     *
     * @param string $dniTipo
     * @return User
     */
    public function setDniTipo($dniTipo)
    {
        $this->dniTipo = $dniTipo;

        return $this;
    }

    /**
     * Get dniTipo
     *
     * @return string 
     */
    public function getDniTipo()
    {
        return $this->dniTipo;
    }

    /**
     * Set dniNumero
     *
     * @param string $dniNumero
     * @return User
     */
    public function setDniNumero($dniNumero)
    {
        $this->dniNumero = $dniNumero;

        return $this;
    }

    /**
     * Get dniNumero
     *
     * @return string 
     */
    public function getDniNumero()
    {
        return $this->dniNumero;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return User
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return User
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imageType
     *
     * @param string $imageType
     * @return User
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;

        return $this;
    }

    /**
     * Get imageType
     *
     * @return string 
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * Add prestamos
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\Prestamo $prestamos
     * @return User
     */
    public function addPrestamo(\LaFuente\Bundle\PrestamosBundle\Entity\Prestamo $prestamos)
    {
        $this->prestamos[] = $prestamos;

        return $this;
    }

    /**
     * Remove prestamos
     *
     * @param \LaFuente\Bundle\PrestamosBundle\Entity\Prestamo $prestamos
     */
    public function removePrestamo(\LaFuente\Bundle\PrestamosBundle\Entity\Prestamo $prestamos)
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

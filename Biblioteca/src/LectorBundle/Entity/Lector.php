<?php

namespace LectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lector
 *
 * @ORM\Table(name="lector")
 * @ORM\Entity
 */
class Lector
{
    /**
     * @var string
     *
     * @ORM\Column(name="rut", type="string", length=10, nullable=false)
     * @ORM\Id
     */
    private $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=10, nullable=false)
     */
    private $sexo;

    /**
     * @var \string
     *
     * @ORM\Column(name="fnac", type="string", nullable=false)
     */
    private $fnac;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=45, nullable=true)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;



    /**
     * Set rut
     *
     * @param string $rut
     *
     * @return Lector
     */
    public function setRut($rut)
    {
        $this->rut = $rut;

        return $this;
    }

    /**
     * Get rut
     *
     * @return string
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Lector
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
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Lector
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
     * Set fnac
     *
     * @param \DateTime $fnac
     *
     * @return Lector
     */
    public function setFnac($fnac)
    {
        $this->fnac = $fnac;

        return $this;
    }

    /**
     * Get fnac
     *
     * @return \DateTime
     */
    public function getFnac()
    {
        return $this->fnac;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Lector
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Lector
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Lector
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function __toString()
    {
        return $this->getRut();
    }
}

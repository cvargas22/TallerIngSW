<?php

namespace AdministradorBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Administrador
 *
 * @ORM\Table(name="administrador")
 * @ORM\Entity
 */
class Administrador implements UserInterface
{

    function eraseCredentials()
    {
    }

    function getRoles()
    {
    return array('ROLE_ADMINISTRADOR');
    }

    function getUsername()
    {
    return $this->idadmin;
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="idadmin", type="string", length=10, nullable=false)
     * @ORM\Id
     */
    private $idadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=10, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;



    /**
     * Set idadmin
     *
     * @param string $idadmin
     *
     * @return Administrador
     */
    public function setIdadmin($idadmin)
    {
        $this->idadmin = $idadmin;

        return $this;
    }

    /**
     * Get idadmin
     *
     * @return string
     */
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Administrador
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Administrador
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
}

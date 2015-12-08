<?php

namespace PrestamoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestamo
 *
 * @ORM\Table(name="prestamo", indexes={@ORM\Index(name="fk_prestamo_lector_idx", columns={"lector_rut"}), @ORM\Index(name="fk_prestamo_diario1_idx", columns={"diario_codigo"}), @ORM\Index(name="fk_prestamo_administrador1_idx", columns={"administrador_idadmin"})})
 * @ORM\Entity
 */
class Prestamo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprestamo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $idprestamo;

    /**
     * @var \Administrador
     *
     * @ORM\ManyToOne(targetEntity="AdministradorBundle\Entity\Administrador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="administrador_idadmin", referencedColumnName="idadmin")
     * })
     */
    private $administrador;

    /**
     * @var \Diario
     *
     * @ORM\ManyToOne(targetEntity="DiarioBundle\Entity\Diario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="diario_codigo", referencedColumnName="codigo")
     * })
     */
    private $diario;

    /**
     * @var \Lector
     *
     * @ORM\ManyToOne(targetEntity="LectorBundle\Entity\Lector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lector_rut", referencedColumnName="rut")
     * })
     */
    private $lector;

    /**
     * @var \string
     *
     * @ORM\Column(name="fecha_prestamo", type="string", nullable=false)
     */
    private $fechaPrestamo;

    /**
     * Get idprestamo
     *
     * @return integer
     */
    public function getIdprestamo()
    {
        return $this->idprestamo;
    }

    /**
     * Set fechaPrestamo
     *
     * @param \DateTime $fechaPrestamo
     *
     * @return Prestamo
     */
    public function setFechaPrestamo($fechaPrestamo)
    {
        $this->fechaPrestamo = $fechaPrestamo;

        return $this;
    }

    /**
     * Get fechaPrestamo
     *
     * @return \DateTime
     */
    public function getFechaPrestamo()
    {
        return $this->fechaPrestamo;
    }

    /**
     * Set administrador
     *
     * @param \AdministradorBundle\Entity\Administrador $administrador
     *
     * @return Prestamo
     */
    public function setAdministrador(\AdministradorBundle\Entity\Administrador $administrador = null)
    {
        $this->administrador = $administrador;

        return $this;
    }

    /**
     * Get administrador
     *
     * @return \AdministradorBundle\Entity\Administrador
     */
    public function getAdministrador()
    {
        return $this->administrador;
    }

    /**
     * Set diario
     *
     * @param \DiarioBundle\Entity\Diario $diario
     *
     * @return Prestamo
     */
    public function setDiario(\DiarioBundle\Entity\Diario $diario = null)
    {
        $this->diario = $diario;

        return $this;
    }

    /**
     * Get diario
     *
     * @return \DiarioBundle\Entity\Diario
     */
    public function getDiario()
    {
        return $this->diario;
    }

    /**
     * Set lector
     *
     * @param \LectorBundle\Entity\Lector $lector
     *
     * @return Prestamo
     */
    public function setLector(\LectorBundle\Entity\Lector $lector = null)
    {
        $this->lector = $lector;

        return $this;
    }

    /**
     * Get lector
     *
     * @return \LectorBundle\Entity\Lector
     */
    public function getLector()
    {
        return $this->lector;
    }

    public function __toString()
    {
        return $this->getIdprestamo();
    }
}

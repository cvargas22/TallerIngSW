<?php

namespace DiarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diario
 *
 * @ORM\Table(name="diario")
 * @ORM\Entity
 */
class Diario
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=6, nullable=false)
     * @ORM\Id
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_ingreso", type="string", nullable=false)
     */
    private $fechaIngreso;



    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Diario
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Diario
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    public function __toString()
    {
        return $this->getCodigo();
    }
}

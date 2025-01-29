<?php

use Doctrine\ORM\Mapping as ORM;

/**
* Equipo
*
* @ORM\Table(name="equipo")
* @ORM\Entity(repositoryClass="EquipoRepository")
*/
class Equipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_equipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEquipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="socios", type="integer", nullable=true)
     */
    private $socios;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fundacion", type="integer", nullable=true)
     */
    private $fundacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad", type="string", length=100, nullable=true)
     */
    private $ciudad;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->idEquipo;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSocios(): ?int
    {
        return $this->socios;
    }

    public function setSocios(?int $socios): self
    {
        $this->socios = $socios;

        return $this;
    }

    public function getFundacion(): ?int
    {
        return $this->fundacion;
    }

    public function setFundacion(?int $fundacion): self
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}

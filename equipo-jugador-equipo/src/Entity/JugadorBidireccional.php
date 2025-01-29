<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * JugadorBidireccional
 *
 * @ORM\Table(name="jugador", indexes={@ORM\Index(name="jugador_equipo_FK", columns={"equipo"})})
 * @ORM\Entity
 */
class JugadorBidireccional
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_jugador", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJugador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=true)
     */
    private $apellidos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="edad", type="smallint", nullable=true)
     */
    private $edad;

    /**
     * @var \EquipoBidireccional
     *
     * @ORM\ManyToOne(targetEntity="EquipoBidireccional", inversedBy="jugadores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo", referencedColumnName="id_equipo")
     * })
     */
    private $equipo;
 

    // Getters and Setters

    public function getIdJugador(): ?int
    {
        return $this->idJugador;
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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEquipo(): ?EquipoBidireccional
    {
        return $this->equipo;
    }

    public function setEquipo(?EquipoBidireccional $equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }

   
}

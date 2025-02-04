<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * Partido
 *
 * @ORM\Table(name="partido", indexes={@ORM\Index(name="partido_Equipo_FK", columns={"id_equipo_local"}), @ORM\Index(name="partido_equipo_FK_1", columns={"id_equipo_visitante"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="PartidoRepository")
 */
class Partido
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_partido", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPartido;

    /**
     * @var int|null
     *
     * @ORM\Column(name="goles_local", type="integer", nullable=true)
     */
    private $golesLocal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="goles_visitante", type="integer", nullable=true)
     */
    private $golesVisitante;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \equipoLocal
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo_local", referencedColumnName="id_equipo")
     * })
     */
    private $EquipoLocal;

    /**
     * @var \equipoVisitante
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo_visitante", referencedColumnName="id_equipo")
     * })
     */
    private $EquipoVisitante;

    

    /**
     * Get the value of idPartido
     *
     * @return  int
     */ 
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    /**
     * Set the value of idPartido
     *
     * @param  int  $idPartido
     *
     * @return  self
     */ 
    public function setIdPartido(int $idPartido)
    {
        $this->idPartido = $idPartido;

        return $this;
    }

    /**
     * Get the value of golesLocal
     *
     * @return  int|null
     */ 
    public function getGolesLocal()
    {
        return $this->golesLocal;
    }

    /**
     * Set the value of golesLocal
     *
     * @param  int|null  $golesLocal
     *
     * @return  self
     */ 
    public function setGolesLocal($golesLocal)
    {
        $this->golesLocal = $golesLocal;

        return $this;
    }

    /**
     * Get the value of golesVisitante
     *
     * @return  int|null
     */ 
    public function getGolesVisitante()
    {
        return $this->golesVisitante;
    }

    /**
     * Set the value of golesVisitante
     *
     * @param  int|null  $golesVisitante
     *
     * @return  self
     */ 
    public function setGolesVisitante($golesVisitante)
    {
        $this->golesVisitante = $golesVisitante;

        return $this;
    }

    /**
     * Get the value of fecha
     *
     * @return  \DateTime|null
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @param  \DateTime|null  $fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of EquipoLocal
     *
     * @return  \Equipo
     */ 
    public function getEquipoLocal()
    {
        return $this->EquipoLocal;
    }

    /**
     * Set the value of EquipoLocal
     *
     * @param  \Equipo  $EquipoLocal
     *
     * @return  self
     */ 
    public function setEquipoLocal(\Equipo $EquipoLocal)
    {
        $this->EquipoLocal = $EquipoLocal;

        return $this;
    }

    /**
     * Get the value of EquipoVisitante
     *
     * @return  \Equipo
     */ 
    public function getEquipoVisitante()
    {
        return $this->EquipoVisitante;
    }

    /**
     * Set the value of EquipoVisitante
     *
     * @param  \Equipo  $EquipoVisitante
     *
     * @return  self
     */ 
    public function setEquipoVisitante(\Equipo $EquipoVisitante)
    {
        $this->EquipoVisitante = $EquipoVisitante;

        return $this;
    }
}

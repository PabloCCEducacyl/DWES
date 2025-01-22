<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="socios", type="integer", nullable=false)
     */
    private $socios;

    /**
     * @var int
     *
     * @ORM\Column(name="fundacion", type="integer", nullable=false)
     */
    private $fundacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255, nullable=false)
     */
    private $ciudad;



    /**
     * Get the value of idEquipo
     *
     * @return  int
     */ 
    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    /**
     * Set the value of idEquipo
     *
     * @param  int  $idEquipo
     *
     * @return  self
     */ 

    public function setIdEquipo(int $idEquipo)
    {
        $this->idEquipo = $idEquipo;

        return $this;
    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of socios
     *
     * @return  int
     */ 
    public function getSocios()
    {
        return $this->socios;
    }

    /**
     * Set the value of socios
     *
     * @param  int  $socios
     *
     * @return  self
     */ 
    public function setSocios(int $socios)
    {
        $this->socios = $socios;

        return $this;
    }

    /**
     * Get the value of fundacion
     *
     * @return  int
     */ 
    public function getFundacion()
    {
        return $this->fundacion;
    }

    /**
     * Set the value of fundacion
     *
     * @param  int  $fundacion
     *
     * @return  self
     */ 
    public function setFundacion(int $fundacion)
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    /**
     * Get the value of ciudad
     *
     * @return  string
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @param  string  $ciudad
     *
     * @return  self
     */ 
    public function setCiudad(string $ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}

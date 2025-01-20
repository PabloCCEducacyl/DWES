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


}

<?php

namespace App\Entity;

use App\Repository\MascotaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MascotaRepository::class)]
class Mascota
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaNac = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $Cliente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fechaNac;
    }

    public function setFechaNac(\DateTimeInterface $fechaNac): static
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->Cliente;
    }

    public function setCliente(?Cliente $Cliente): static
    {
        $this->Cliente = $Cliente;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\PeliculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeliculaRepository::class)]
class Pelicula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripccion = null;

    #[ORM\Column(nullable: true)]
    private ?int $anyo = null;

    #[ORM\Column(nullable: true)]
    private ?int $duracion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripccion(): ?string
    {
        return $this->descripccion;
    }

    public function setDescripccion(?string $descripccion): static
    {
        $this->descripccion = $descripccion;

        return $this;
    }

    public function getAnyo(): ?int
    {
        return $this->anyo;
    }

    public function setAnyo(?int $anyo): static
    {
        $this->anyo = $anyo;

        return $this;
    }

    public function getDuracion(): ?int
    {
        return $this->duracion;
    }

    public function setDuracion(?int $duracion): static
    {
        $this->duracion = $duracion;

        return $this;
    }
}

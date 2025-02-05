<?php

namespace App\Controller;

use App\Entity\Pelicula;
use App\Repository\PeliculaRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/pelicula', name: 'pelicula')]
final class PeliculaController extends AbstractController
{
    #[Route('/', name: 'index_pelicula')]
    public function index(): Response
    {
        return $this->json("Esta es la ruta index de pelicula");
    }

    #[Route('/lista', name: 'lista_pelicula', methods: ['GET'])]
    public function peliculaList(EntityManagerInterface $emi): Response
    {
        $peliculas = $emi->getRepository(Pelicula::class)->findAll();
        $peliculasJSON = [];
        foreach ($peliculas as $pelicula) {
            $peliculasJSON[] = [
            'titulo' => $pelicula->getTitulo(),
            'descripcion' => $pelicula->getDescripccion(),
            'año' => $pelicula->getAnyo(),
            'duracion' => $pelicula->getDuracion()
            ];
        }
        return $this->json($peliculasJSON);
    }

    #[Route('/{id}', name: 'ver_pelicula', methods: ['GET'])]
    public function peliculaVer(EntityManagerInterface $emi, int $id): Response
    {
        $pelicula = $emi->getRepository(Pelicula::class)->find($id);
        if ($pelicula) {
            $peliculasJSON = [
                'titulo' => $pelicula->getTitulo(),
                'descripcion' => $pelicula->getDescripccion(),
                'año' => $pelicula->getAnyo(),
                'duracion' => $pelicula->getDuracion()
            ];
        } else {
            $peliculasJSON = "No encontrado";
        }
        return $this->json($peliculasJSON);
    }
}
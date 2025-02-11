<?php

namespace App\Controller;

use App\Entity\Pelicula;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/pelicula', name: 'pelicula')]
final class PeliculaController extends AbstractController
{
<<<<<<< HEAD

=======
>>>>>>> 480aaa0feb9dfad0c10cde68873bf7ab591b9f7f
    #[Route('/', name: 'index_pelicula', methods: ['GET'])]
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
                "Titulo" => $pelicula->getTitulo(),
                "Descripcion" => $pelicula->getDescripccion(),
                "Año" => $pelicula->getAnyo(),
                "Duración" => $pelicula->getDuracion()
            ];
        }
        return $this->json($peliculasJSON);
    }
<<<<<<< HEAD
    #[Route('/{id}', name: 'get_pelicula', methods: ['GET'])]
    public function peliculaVer(EntityManagerInterface $emi, int $id): Response
    {
        $pelicula=$emi->getRepository(Pelicula::class)->find($id);
        if(!empty($pelicula)){
            $peliculasJSON[] = [
=======

    #[Route('/{id}', name: 'ver_pelicula', methods: ['GET'])]
    public function peliculaVer(EntityManagerInterface $emi, int $id): Response
    {
        $pelicula = $emi->getRepository(Pelicula::class)->find($id);
        if ($pelicula) {
            $peliculasJSON = [
>>>>>>> 480aaa0feb9dfad0c10cde68873bf7ab591b9f7f
                "Titulo" => $pelicula->getTitulo(),
                "Descripcion" => $pelicula->getDescripccion(),
                "Año" => $pelicula->getAnyo(),
                "Duración" => $pelicula->getDuracion()
            ];
        } else {
            $peliculasJSON = "No encontrado";
        }
        return $this->json($peliculasJSON);
    }
<<<<<<< HEAD
    #[Route('/', name: 'registrar_pelicula', methods: ['PUT'])]
=======

    #[Route('/', name: 'registrar_pelicula', methods: ['POST'])]
>>>>>>> 480aaa0feb9dfad0c10cde68873bf7ab591b9f7f
    public function peliculaRegistrar(EntityManagerInterface $emi, Request $request): Response
    {
        //Llamada a la ruta 
        /*
        "titulo" : "Nueva peli",
        "descripcion" : "Esta es la nueva peli",
        "anyo" : 2025,
        "duracion" : 90
        */
        $body=$request->getContent();
        $data = json_decode($body, true);

        $pelicula = new Pelicula();
        $pelicula->setTitulo($data['titulo']);
        $pelicula->setDescripccion($data['descripcion']);
        $pelicula->setAnyo($data['anyo']);
        $pelicula->setDuracion($data['duracion']);
        
        $emi->persist($pelicula);
        $emi->flush();

        return $this->json("todo correcto");
    }

    #[Route('/{id}', name: 'borrar_pelicula', methods: ['DELETE'])]
    public function peliculaBorrar(EntityManagerInterface $emi, int $id): Response
    {
        $pelicula = $emi->getRepository(Pelicula::class)->find($id);
        if(!$pelicula){
            $respuesta = "Pelicula no existe";
        } else {
            $emi->remove($pelicula);
            $emi->flush();
            $respuesta = "Borrado correctamente";
        }

        return $this->json($respuesta);
    }
}
<<<<<<< HEAD
=======

>>>>>>> 480aaa0feb9dfad0c10cde68873bf7ab591b9f7f

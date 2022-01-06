<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class GenreController extends AbstractController
{
    #[Route('/genre', name: 'genre')]
    public function index(Request $request, GenreRepository $genreRepository, PaginatorInterface $paginator): Response
    {
        $genres = $genreRepository->findAll();
        $genres = $paginator->paginate(
            $genres,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('genre/index.html.twig', [
            'genres' => $genres,
        ]);
    }

    #[Route('/genre/{$id}', name: 'genre_genre')]
    public function Genre(Genre $genre, LivreRepository $livreRepository): Response
    {
            $livres = $livreRepository->findAllGenre($genre);

            return $this->render('genre/index.html.twig', [
                'genres' => $genre,
                'livres' => $livres,
            ]);
    }



}

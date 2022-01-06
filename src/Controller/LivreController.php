<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class LivreController extends AbstractController
{
    #[Route('/livre', name: 'livre')]
    public function index(Request $request, LivreRepository $livreRepository, PaginatorInterface $paginator): Response
    {
        $livres = $livreRepository->findAll();
        $livres = $paginator->paginate(
            $livres,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

    #[Route('/livre/{id}', name: 'livre_details')]
    public function details(Livre $livre):Response
    {
        return $this->render('livre/details.html.twig', [
            'livre' => $livre,
        ]);
    }


}

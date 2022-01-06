<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Repository\AuteurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Knp\Component\Pager\PaginatorInterface;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'auteur')]
    public function index(Request $request, AuteurRepository $auteurRepository, PaginatorInterface $paginator): Response
    {

        $auteurs = $auteurRepository->findAll();
        $auteurs = $paginator->paginate(
            $auteurs,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }
    #[Route('/auteur/{id}', name: 'auteur_details')]
    public function details(Auteur $auteur):Response
    {
        return $this->render('auteur/details.html.twig', [
            'auteur' => $auteur,
        ]);
    }
}

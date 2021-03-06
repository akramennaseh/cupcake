<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(LivreRepository $livreRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'livres' => $livreRepository->lastTree(),
        ]);
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Auteur;
use App\Entity\Genre;
use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bookstore');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Livres', 'fas fa-book', Livre::class);
        yield MenuItem::linkToCrud('Auteurs', 'fas fa-book', Auteur::class);
        yield MenuItem::linkToCrud('Genres', 'fas fa-book', Genre::class);
   
    }
}

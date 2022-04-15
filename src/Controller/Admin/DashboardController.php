<?php

namespace App\Controller\Admin;

use App\Entity\Decoration;
use App\Entity\Tableau;
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
            ->setTitle('Dany');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute("Voir le site", "fa fa-eye", "homepage");
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Décorations', 'fas fa-list', Decoration::class);
        yield MenuItem::linkToCrud('Tableaux', 'fas fa-list', Tableau::class);
    }
}

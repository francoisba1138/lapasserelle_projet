<?php

namespace App\Controller\Admin;
use App\Entity\Lodging;
use App\Entity\User;
use App\Entity\Address;
use App\Entity\Specification;
use App\Entity\Activity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tripee');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
       yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Hébergements', 'fas fa-list', Lodging::class);
        yield MenuItem::linkToCrud('Adresses', 'fas fa-list', Address::class);
        yield MenuItem::linkToCrud('Caracteristiques', 'fas fa-list', Specification::class);
        yield MenuItem::linkToCrud('Activités', 'fas fa-list', Activity::class);


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

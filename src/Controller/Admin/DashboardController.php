<?php

namespace App\Controller\Admin;

use App\Entity\Artiste;
use App\Entity\Concert;
use App\Entity\Events;
use App\Entity\FAQ;
use App\Entity\Festival;
use App\Entity\Information;
use App\Entity\Partenaires;
use App\Entity\POI;
use App\Entity\Scene;
use App\Entity\Utilisateur;
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
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(FestivalCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Incroyable Back-Office');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('CRUD');
        yield MenuItem::linkToCrud('Festival', 'fa fa-home', Festival::class);
        yield MenuItem::linkToCrud('Artiste', 'fa fa-user', Artiste::class);
        yield MenuItem::linkToCrud('Concert', 'fa fa-home', Concert::class);
        yield MenuItem::linkToCrud('Events', 'fa fa-home', Events::class);
        yield MenuItem::linkToCrud('FAQ', 'fa fa-question', FAQ::class);
        yield MenuItem::linkToCrud('Information', 'fa fa-question', Information::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa fa-user', Partenaires::class);
        yield MenuItem::linkToCrud('Points d\'intérêts', 'fa fa-map-pin', POI::class);
        yield MenuItem::linkToCrud('Scene', 'fa fa-home', Scene::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', Utilisateur::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

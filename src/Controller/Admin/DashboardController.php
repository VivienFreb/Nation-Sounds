<?php

namespace App\Controller\Admin;

use App\Entity\Artiste;
use App\Entity\Blog;
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
     * @Route("/dashboard", name="dashboard")
     * @Route("/", name="home")
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
        yield MenuItem::linkToCrud('Festival', 'fa fa-play', Festival::class);
        yield MenuItem::linkToCrud('Artiste', 'fa fa-user', Artiste::class);
        yield MenuItem::linkToCrud('Concert', 'fa fa-music', Concert::class);
        yield MenuItem::linkToCrud('Events', 'fa fa-calendar-alt', Events::class);
        yield MenuItem::linkToCrud('FAQ', 'fa fa-question', FAQ::class);
        yield MenuItem::linkToCrud('Information', 'fa fa-info', Information::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa fa-building', Partenaires::class);
        yield MenuItem::linkToCrud('Points d\'intérêts', 'fa fa-map-pin', POI::class);
        yield MenuItem::linkToCrud('Scene', 'fa fa-search-location', Scene::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Blog', 'fa fa-user', Blog::class);

        yield MenuItem::section('Routes API');
        yield MenuItem::linkToUrl('Festival', 'fa fa-play', '/api/#tag/Festival');
        yield MenuItem::linkToUrl('Artiste', 'fa fa-user', '/api/#tag/Artiste');
        yield MenuItem::linkToUrl('Concert', 'fa fa-music', '/api/#tag/Concert');
        yield MenuItem::linkToUrl('Events', 'fa fa-calendar-alt', '/api/#tag/Events');
        yield MenuItem::linkToUrl('FAQ', 'fa fa-question', '/api/#tag/FAQ');
        yield MenuItem::linkToUrl('Information', 'fa fa-info', '/api/#tag/Information');
        yield MenuItem::linkToUrl('Partenaires', 'fa fa-building', '/api/#tag/Partenaires');
        yield MenuItem::linkToUrl('Points d\'intérêts', 'fa fa-map-pin', '/api/#tag/POI');
        yield MenuItem::linkToUrl('Scene', 'fa fa-search-location', '/api/#tag/Scene');
        yield MenuItem::linkToUrl('Utilisateur', 'fa fa-user', '/api/#tag/Utilisateur');
        yield MenuItem::linkToUrl('Blog', 'fa fa-user', '/api/#tag/Blog');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

<?php

namespace App\Controller\Admin;
use App\Entity\Baby;
use App\Entity\Gift;
use App\Entity\Partner;
use App\Entity\Competition;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\CompetitionCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminurlGenerator $adminurlGenerator
    )
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminurlGenerator
        ->setController(CompetitionCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ayapi');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Bébé', 'fas fa-list', Baby::class);
        yield MenuItem::linkToCrud('Competition', 'fas fa-list', Competition::class);
        yield MenuItem::linkToCrud('Cadeau', 'fas fa-list', Gift::class);
        yield MenuItem::linkToCrud('Partenaire', 'fas fa-list', Partner::class);
    }
}

<?php
namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\ProjectImage;
use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Entity\Education;
use App\Entity\Competence;
use App\Entity\ExperienceImage;


#[IsGranted("ROLE_ADMIN")]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Projets', 'fa fa-code', Project::class);
        yield MenuItem::linkToCrud('Images projets', 'fa fa-image', ProjectImage::class);
        yield MenuItem::linkToCrud('Experiences', 'fa fa-briefcase', Experience::class);
        yield MenuItem::linkToCrud('Parcours scolaire', 'fa fa-graduation-cap', Education::class);
        yield MenuItem::linkToCrud('Compétences', 'fa fa-graduation-cap', Competence::class);
        yield MenuItem::linkToCrud('Images expériences', 'fa fa-image', ExperienceImage::class);

    }
}

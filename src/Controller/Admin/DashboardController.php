<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CategoryCrudController;
use App\Controller\Admin\ContactMessageCrudController;
use App\Controller\Admin\ExperienceCrudController;
use App\Controller\Admin\ProjectCrudController;
use App\Controller\Admin\SkillCrudController;
use App\Controller\Admin\TechnologyCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Option\ColorScheme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect(
            $adminUrlGenerator->setController(ProjectCrudController::class)->setAction(Action::INDEX)->generateUrl()
        );
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addAssetMapperEntry('app')
            ->addCssFile('styles/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return 
            Dashboard::new()->setTitle('Mon Portfolio — Admin')
            ->setDefaultColorScheme(ColorScheme::LIGHT);
;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkTo(ProjectCrudController::class, 'Projets', 'fas fa-code')->setAction(Action::INDEX);
        yield MenuItem::linkTo(TechnologyCrudController::class, 'Technologies', 'fas fa-cogs')->setAction(Action::INDEX);
        yield MenuItem::linkTo(CategoryCrudController::class, 'Catégories', 'fas fa-folder')->setAction(Action::INDEX);
        yield MenuItem::linkTo(SkillCrudController::class, 'Compétences', 'fas fa-star')->setAction(Action::INDEX);
        yield MenuItem::linkTo(ExperienceCrudController::class, 'Expériences', 'fas fa-briefcase')->setAction(Action::INDEX);
        yield MenuItem::linkTo(ContactMessageCrudController::class, 'Messages', 'fas fa-envelope')->setAction(Action::INDEX);
    }
}
<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\ContactMessage;
use App\Entity\Experience;
use App\Entity\Project;
use App\Entity\Skill;
use App\Entity\Technology;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkTo('Projets', 'fas fa-code', Project::class);
        yield MenuItem::linkTo('Technologies', 'fas fa-cogs', Technology::class);
        yield MenuItem::linkTo('Catégories', 'fas fa-folder', Category::class);
        yield MenuItem::linkTo('Compétences', 'fas fa-star', Skill::class);
        yield MenuItem::linkTo('Expériences', 'fas fa-briefcase', Experience::class);
        yield MenuItem::linkTo('Messages', 'fas fa-envelope', ContactMessage::class);
    }
}

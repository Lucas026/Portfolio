<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
     #[Route('/', name: 'app_home')]
    public function index(
        ProjectRepository $projectRepository,
        SkillRepository $skillRepository,
        ExperienceRepository $experienceRepository,
    ): Response {
        return $this->render('home/index.html.twig', [
            'featuredProjects' => $projectRepository->findBy(['featured' => true], ['position' => 'ASC'], 3),
            'skills' => $skillRepository->findAll(),
            'experiences' => $experienceRepository->findBy([], ['startDate' => 'DESC']),
        ]);
    }
}

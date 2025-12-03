<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findBy([], ['id' => 'DESC'], 3);

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(
        ExperienceRepository $experienceRepository,
        EducationRepository $educationRepository
    ): Response {
        $experiences = $experienceRepository->findBy([], ['dateDebut' => 'DESC']);
        $educations  = $educationRepository->findBy([], ['dateDebut' => 'DESC']);

        return $this->render('about/index.html.twig', [
            'experiences' => $experiences,
            'educations'  => $educations,
        ]);
    }
}

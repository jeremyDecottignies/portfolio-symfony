<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExperienceController extends AbstractController
{
    #[Route('/experience/{id}', name: 'experience_show')]
    public function show(int $id, ExperienceRepository $repo): Response
    {
        $experience = $repo->find($id);

        if (!$experience) {
            throw $this->createNotFoundException('Expérience introuvable');
        }

        return $this->render('experience/show.html.twig', [
            'experience' => $experience,
        ]);
    }
}

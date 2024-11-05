<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_')]
class WorkApproachController extends AbstractController
{
    #[Route('work-approach', name: 'work_approach')]
    public function index(): Response
    {
        return $this->render('work_approach/index.html.twig');
    }
}

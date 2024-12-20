<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_')]
class AboutController extends AbstractController
{
    #[Route('about', name: 'about')]
    public function index(): Response
    {
        return $this->render('about/index.html.twig');
    }
}

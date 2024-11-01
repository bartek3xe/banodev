<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_')]
class StackController extends AbstractController
{
    #[Route('stack', name: 'stack')]
    public function index(): Response
    {
        return $this->render('stack/index.html.twig', [
            'title' => 'Stack',
        ]);
    }
}

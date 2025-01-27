<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LeController extends AbstractController
{
    #[Route('/le', name: 'app_le')]
    public function index(): Response
    {
        return $this->render('le/index.html.twig', [
            'controller_name' => 'LeController',
        ]);
    }
}

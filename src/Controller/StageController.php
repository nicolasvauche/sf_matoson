<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stage')]
class StageController extends AbstractController
{
    #[Route('/', name: 'stage', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('stage/index.html.twig', []);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Route('/matos', name: 'matos')]
    #[Route('/categories', name: 'category')]
    #[Route('/etat', name: 'health')]
    #[Route('/stage', name: 'stage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [

        ]);
    }
}

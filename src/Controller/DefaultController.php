<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\EquipmentRepository;
use App\Repository\HealthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EquipmentRepository $equipmentRepository, CategoryRepository $categoryRepository, HealthRepository $healthRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'equipments' => $equipmentRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'healths' => $healthRepository->findAll(),
        ]);
    }
}

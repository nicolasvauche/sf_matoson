<?php

namespace App\Controller;

use App\Entity\Health;
use App\Form\HealthType;
use App\Repository\HealthRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/etat')]
class HealthController extends AbstractController
{
    #[Route('/', name: 'health', methods: ['GET'])]
    public function index(HealthRepository $healthRepository): Response
    {
        return $this->render('health/index.html.twig', [
            'healths' => $healthRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'health.new', methods: ['GET', 'POST'])]
    public function new(Request $request, HealthRepository $healthRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $health = new Health();
        $form = $this->createForm(HealthType::class, $health);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            /** @var UploadedFile $healthImageFile */
            $healthImageFile = $form->get('image')->getData();

            if ($healthImageFile) {
                $fileName = $fileUploader->upload($healthImageFile, $this->getParameter('images_health'), $slugger->slug($health->getName()));
                $health->setImage($fileName);
            }
            $healthRepository->add($health);
            return $this->redirectToRoute('health', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('health/new.html.twig', [
            'health' => $health,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'health.show', methods: ['GET'])]
    public function show(Health $health): Response
    {
        return $this->render('health/show.html.twig', [
            'health' => $health,
        ]);
    }

    #[Route('/modifier/{slug}', name: 'health.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Health $health, HealthRepository $healthRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(HealthType::class, $health);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $healthImageFile */
            $healthImageFile = $form->get('image')->getData();

            if ($healthImageFile) {
                if ($health->getImage()) {
                    $fileUploader->delete($this->getParameter('images_health'), $health->getImage());
                }
                $fileName = $fileUploader->upload($healthImageFile, $this->getParameter('images_health'), $slugger->slug($health->getName()));
                $health->setImage($fileName);
            }
            $healthRepository->add($health);
            return $this->redirectToRoute('health.show', ['slug' => $health->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('health/edit.html.twig', [
            'health' => $health,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'health.delete', methods: ['POST'])]
    public function delete(Request $request, Health $health, HealthRepository $healthRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('delete' . $health->getId(), $request->request->get('_token'))) {
            $fileUploader->delete($this->getParameter('images_health'), $health->getImage());
            $healthRepository->remove($health);
        }

        return $this->redirectToRoute('health', [], Response::HTTP_SEE_OTHER);
    }
}

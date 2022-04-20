<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/armoire')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'category', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'category.new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategoryRepository $categoryRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            /** @var UploadedFile $categoryImageFile */
            $categoryImageFile = $form->get('image')->getData();

            if ($categoryImageFile) {
                $fileName = $fileUploader->upload($categoryImageFile, $this->getParameter('images_category'), $slugger->slug($category->getName()));
                $category->setImage($fileName);
            }
            $categoryRepository->add($category);
            return $this->redirectToRoute('category.show', ['slug' => $slugger->slug($category->getName())], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'category.show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/modifier/{slug}', name: 'category.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, CategoryRepository $categoryRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $categoryImageFile */
            $categoryImageFile = $form->get('image')->getData();

            if ($categoryImageFile) {
                if ($category->getImage()) {
                    $fileUploader->delete($this->getParameter('images_category'), $category->getImage());
                }
                $fileName = $fileUploader->upload($categoryImageFile, $this->getParameter('images_category'), $slugger->slug($category->getName()));
                $category->setImage($fileName);
            }
            $categoryRepository->add($category);
            return $this->redirectToRoute('category.show', ['slug' => $slugger->slug($category->getName())], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'category.delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, CategoryRepository $categoryRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get('_token'))) {
            $fileUploader->delete($this->getParameter('images_category'), $category->getImage());
            $categoryRepository->remove($category);
        }

        return $this->redirectToRoute('category', [], Response::HTTP_SEE_OTHER);
    }
}

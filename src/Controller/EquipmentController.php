<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Form\EquipmentType;
use App\Repository\EquipmentRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/matos')]
class EquipmentController extends AbstractController
{
    #[Route('/', name: 'equipment', methods: ['GET'])]
    public function index(EquipmentRepository $equipmentRepository): Response
    {
        return $this->render('equipment/index.html.twig', [
            'equipmentsOwned' => $equipmentRepository->findByHealth('bon-etat'),
            'equipmentsUsed' => $equipmentRepository->findByHealth('abime'),
            'equipmentsNeeded' => $equipmentRepository->findByHealth('a-prevoir'),
        ]);
    }

    #[Route('/ajouter', name: 'equipment.new', methods: ['GET', 'POST'])]
    public function new(Request $request, EquipmentRepository $equipmentRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equipment = $form->getData();
            /** @var UploadedFile $equipmentImageFile */
            $equipmentImageFile = $form->get('image')->getData();
            if ($equipmentImageFile) {
                $fileName = $fileUploader->upload($equipmentImageFile, $this->getParameter('images_equipment'), $slugger->slug($equipment->getName()));
                $equipment->setImage($fileName);
            }
            /** @var UploadedFile $equipmentBillFile */
            $equipmentBillFile = $form->get('bill')->getData();
            if ($equipmentBillFile) {
                $fileName = $fileUploader->upload($equipmentBillFile, $this->getParameter('images_bill'), $slugger->slug($equipment->getBill()));
                $equipment->setBill($fileName);
            }
            $equipmentRepository->add($equipment);
            return $this->redirectToRoute('equipment', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipment/new.html.twig', [
            'equipment' => $equipment,
            'form' => $form,
        ]);
    }

    #[Route('/details/{id}-{slug}', name: 'equipment.show', methods: ['GET'])]
    public function show(Equipment $equipment): Response
    {
        return $this->render('equipment/show.html.twig', [
            'equipment' => $equipment,
        ]);
    }

    #[Route('/modifier/{id}-{slug}', name: 'equipment.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Equipment $equipment, EquipmentRepository $equipmentRepository, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $equipmentImageFile */
            $equipmentImageFile = $form->get('image')->getData();
            if ($equipmentImageFile) {
                if ($equipment->getImage()) {
                    $fileUploader->delete($this->getParameter('images_equipment'), $equipment->getImage());
                }
                $fileName = $fileUploader->upload($equipmentImageFile, $this->getParameter('images_equipment'), $slugger->slug($equipment->getName()));
                $equipment->setImage($fileName);
            }
            /** @var UploadedFile $equipmentBillFile */
            $equipmentBillFile = $form->get('bill')->getData();
            if ($equipmentBillFile) {
                if ($equipment->getBill()) {
                    $fileUploader->delete($this->getParameter('images_bill'), $equipment->getBill());
                }
                $fileName = $fileUploader->upload($equipmentBillFile, $this->getParameter('images_bill'), $slugger->slug($equipment->getName()));
                $equipment->setBill($fileName);
            }
            $equipmentRepository->add($equipment);
            return $this->redirectToRoute('equipment.show', ['id' => $equipment->getId(), 'slug' => $equipment->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipment/edit.html.twig', [
            'equipment' => $equipment,
            'form' => $form,
        ]);
    }

    #[Route('/supprimer/{id}', name: 'equipment.delete', methods: ['POST'])]
    public function delete(Request $request, Equipment $equipment, EquipmentRepository $equipmentRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('delete' . $equipment->getId(), $request->request->get('_token'))) {
            $isThereOthers = $equipmentRepository->findBy(['image' => $equipment->getImage(), 'id' => '<>' . $equipment->getId()]);
            if (!$isThereOthers) {
                $fileUploader->delete($this->getParameter('images_equipment'), $equipment->getImage());
            }
            $equipmentRepository->remove($equipment);
        }

        return $this->redirectToRoute('equipment', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/dupliquer/{id}', name: 'equipment.duplicate', methods: ['POST'])]
    public function duplicate(Request $request, Equipment $equipment, EquipmentRepository $equipmentRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('duplicate' . $equipment->getId(), $request->request->get('_token'))) {
            //$fileUploader->delete($this->getParameter('images_category'), $equipment->getImage());
            $copy = clone $equipment;
            $equipmentRepository->add($copy);
        }

        return $this->redirectToRoute('equipment', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/supprimer-image/{id}', name: 'equipment.delete.image', methods: ['POST'])]
    public function deleteImage(Request $request, Equipment $equipment, EquipmentRepository $equipmentRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('deleteImage' . $equipment->getId(), $request->request->get('_token'))) {
            $isThereOthers = $equipmentRepository->findBy(['image' => $equipment->getImage(), 'id' => '<>' . $equipment->getId()]);
            if (!$isThereOthers) {
                $fileUploader->delete($this->getParameter('images_equipment'), $equipment->getImage());
            }
            $equipment->setImage(null);
            $equipmentRepository->add($equipment);
        }

        return $this->redirectToRoute('equipment.show', ['id' => $equipment->getId(), 'slug' => $equipment->getSlug()], Response::HTTP_SEE_OTHER);
    }

    #[Route('/supprimer-facture/{id}', name: 'equipment.delete.bill', methods: ['POST'])]
    public function deleteBill(Request $request, Equipment $equipment, EquipmentRepository $equipmentRepository, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('deleteBill' . $equipment->getId(), $request->request->get('_token'))) {
            $isThereOthers = $equipmentRepository->findBy(['bill' => $equipment->getBill(), 'id' => '<>' . $equipment->getId()]);
            if (!$isThereOthers) {
                $fileUploader->delete($this->getParameter('images_bill'), $equipment->getBill());
            }
            $equipment->setBill(null);
            $equipmentRepository->add($equipment);
        }

        return $this->redirectToRoute('equipment.show', ['id' => $equipment->getId(), 'slug' => $equipment->getSlug()], Response::HTTP_SEE_OTHER);
    }

    #[Route('/telecharger/facture/{filename}', name: 'equipment.download.bill', methods: ['GET'])]
    public function downloadBill($filename): BinaryFileResponse
    {
        $publicResourcesFolderPath = $this->getParameter('kernel.project_dir') . '/public/bill/';
        return new BinaryFileResponse($publicResourcesFolderPath . $filename);
    }
}

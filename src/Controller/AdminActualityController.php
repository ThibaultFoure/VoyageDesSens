<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route("/admin/actualites", name: "admin_actuality_")]
class AdminActualityController extends AbstractController
{

    #[Route("/", name: "index", methods: ["GET"])]
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('admin_actuality/index.html.twig', [
            'actualities' => $actualityRepository->findAll(),
        ]);
    }

    #[Route("/ajouter", name: "new", methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actuality);
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Nouvelle actualité ajoutée');
            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_actuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }

    #[Route("/{id}", name: "show", methods: ["GET"])]
    public function show(Actuality $actuality): Response
    {
        return $this->render('admin_actuality/show.html.twig', [
            'actuality' => $actuality,
        ]);
    }

    #[Route("/{id}/modifier", name: "edit", methods: ["GET", "POST"])]
    public function edit(Request $request, Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Actualité modifiée');
            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_actuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }


    #[Route("/{id}", name: "delete", methods: ["POST"])]
    public function delete(Request $request, Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actuality->getId(), $request->request->get('_token'))) {
            $entityManager->remove($actuality);
            $entityManager->flush();
        }
        $this->addFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Actualité supprimée');
        return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
    }
}

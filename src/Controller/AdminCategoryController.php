<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route("/admin/categories", name: "admin_category_")]
class AdminCategoryController extends AbstractController
{

    #[Route("/ajouter", name: "new", methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill mx-2"></i> Nouvelle catégorie ajoutée');
            return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_category/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route("/{id}/modifier", name: "edit", methods: ["GET", "POST"])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill mx-2"></i> Catégorie modifiée');
            return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route("/{id}", name: "delete", methods: ["POST"])]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }
        $this->addFlash('danger', '<i class="bi bi-check-circle-fill mx-2"></i> Catégorie supprimée');
        return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
    }
}

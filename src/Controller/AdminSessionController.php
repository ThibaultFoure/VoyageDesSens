<?php

namespace App\Controller;

use App\Entity\Session;
use App\Form\SessionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Entity\Category;

#[Route("/admin/prestation", name: "admin_session_")]
class AdminSessionController extends AbstractController
{

    #[Route("/", name: "index", methods: ["GET"])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('admin_session/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route("/ajouter/{id}", name: "new", methods: ["GET", "POST"])]
    public function new(
        Request $request,
        Category $category,
        EntityManagerInterface $entityManager
    ): Response {
        $session = new Session();
        $session->setCategory($category);
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($session);
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill mx-2"></i> Nouvelle prestation ajoutée');
            return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_session/new.html.twig', [
            'session' => $session,
            'form' => $form,
            'category' => $category,
        ]);
    }

    #[Route("/modifier/{id}", name: "edit", methods: ["GET", "POST"])]
    public function edit(Request $request, Session $session, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', '<i class="bi bi-check-circle-fill mx-2"></i> Prestation modifiée');
            return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_session/edit.html.twig', [
            'session' => $session,
            'form' => $form,
        ]);
    }

    #[Route("/{id}", name: "delete", methods: ["POST"])]
    public function delete(Request $request, Session $session, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $session->getId(), $request->request->get('_token'))) {
            $entityManager->remove($session);
            $entityManager->flush();
        }

        $this->addFlash('danger', '<i class="bi bi-check-circle-fill mx-2"></i> Prestation supprimée');
        return $this->redirectToRoute('admin_session_index', [], Response::HTTP_SEE_OTHER);
    }
}

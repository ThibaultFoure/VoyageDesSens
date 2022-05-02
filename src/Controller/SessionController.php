<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route("/prestations", name: "session_")]
class SessionController extends AbstractController
{

    #[Route("/", name: "index")]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('session/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
    
    #[Route("/price", name: "price")]
    public function gift(CategoryRepository $categoryRepository): Response
    {
        return $this->render('price/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}

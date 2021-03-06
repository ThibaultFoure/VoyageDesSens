<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SessionController extends AbstractController
{

    #[Route("/prestations", name: "session")]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('session/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
    
    #[Route("/prix", name: "price")]
    public function gift(CategoryRepository $categoryRepository): Response
    {
        return $this->render('price/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}

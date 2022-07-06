<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/", name: "home_")]
class HomeController extends AbstractController
{

    #[Route("/", name: "index")]
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualities = $actualityRepository->findBy([], ['createdAt' => 'DESC'], 3);
        return $this->render('home/index.html.twig', ['actualities' => $actualities]);
    }

    #[Route("/mentions-legales", name: "legal_notice")]
    public function legalNoticeIndex(): Response
    {
        return $this->render('legal_notice/index.html.twig');
    }
}

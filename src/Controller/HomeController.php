<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/", name: "home")]
class HomeController extends AbstractController
{

    #[Route("/", name: "")]
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualities = $actualityRepository->findBy([], ['createdAt' => 'DESC'], 2);
        return $this->render('home/index.html.twig', ['actualities' => $actualities]);
    }
}

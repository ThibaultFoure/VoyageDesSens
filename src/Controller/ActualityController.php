<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActualityRepository;
use App\Entity\Actuality;


#[Route("/actualites", name: "actuality_")]
class ActualityController extends AbstractController
{

    #[Route("/", name: "index")]
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualities = $actualityRepository->findAll();
        return $this->render('actuality/index.html.twig', ['actualities' => $actualities]);
    }

    #[Route("/{id}", name: "show")]
    public function show(Actuality $actuality): Response
    {
        return $this->render('actuality/show.html.twig', ['actuality' => $actuality]);
    }
}

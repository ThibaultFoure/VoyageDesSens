<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/parcours", name: "journey")]

class JourneyController extends AbstractController
{

    #[Route("/", name: "")]

    public function index(): Response
    {
        return $this->render('journey/index.html.twig');
    }
}

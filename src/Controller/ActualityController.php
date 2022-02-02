<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/actualites", name="actuality_")
 */
class ActualityController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('actuality/index.html.twig');
    }

    /**
     * @Route("/{id}", name="show")
     */
    public function show(): Response
    {
        return $this->render('actuality/show.html.twig');
    }
}

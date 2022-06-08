<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

#[Route("/contact", name: "contact")]
class ContactController extends AbstractController
{
    #[Route("", name: "")]
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $message = (new Email())
                ->from($contactFormData->getMail())
                ->to($this->getParameter('mailer_to'))
                ->subject('Nouveau mail depuis le site')
                ->html($this->renderView('contact/contactEmail.html.twig', ['contactFormData' => $contactFormData]));
            $mailer->send($message);

            $this->addFlash('success', '<i class="bi bi-envelope-check-fill me-2"></i>Votre message a bien été envoyé !');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        $form = $this-> createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contactFormData = $form->getData();
           //var_dump($contactFormData);
            $this->addFlash('success', 'Mesajınız gönderildi ');
            return $this->redirectToRoute("app_contact");
          }
        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }
}

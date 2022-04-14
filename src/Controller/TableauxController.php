<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class TableauxController extends AbstractController
{
    /**
     * @Route("/tableaux", name="tableaux")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('bruyeredaniele01@gmail.com')
                ->subject($contactFormData['subject'])
                ->text('Name: '.$contactFormData['fullName'].\PHP_EOL.'Subject: '.$contactFormData['subject'].\PHP_EOL.'Email: '.$contactFormData['email'].\PHP_EOL. 'Message: '.$contactFormData['message'],
                    'text/plain');
            $mailer->send($message);

            $this->addFlash('success', 'Your message has been sent');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('front/tableaux.html.twig', [
            'our_form' => $form->createView()
        ]);
    }


}

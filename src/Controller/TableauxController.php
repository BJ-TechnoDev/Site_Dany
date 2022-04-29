<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\TableauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class TableauxController extends AbstractController
{
    /**
     * @Route("/tableaux", name="tableaux")
     */
    public function index(Request $request, MailerInterface $mailer, TableauRepository $repository): Response
    {

        $tab = $repository->findAll();

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('bruyeredaniele01@gmail.com')
                ->subject($contactFormData['subject'])
                ->text('Name: '.$contactFormData['fullName'].\PHP_EOL.'Email: '.$contactFormData['email'].\PHP_EOL. 'Message: '.$contactFormData['message'],
                    'text/plain');
            try {
                $mailer->send($message);

                $this->addFlash('success', '✅ Votre message a bien été envoyé!');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('error', '❌ Une erreur c\'est produite!');
            }

            return $this->redirectToRoute('homepage');
        }

        return $this->render('front/tableaux.html.twig', [
            'our_form' => $form->createView(),
            'tableaux' => $tab
        ]);
    }


}

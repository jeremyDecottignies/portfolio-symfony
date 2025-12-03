<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createFormBuilder()
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['rows' => 6],
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Construire l'email
            $email = (new Email())
                ->from('jeremyDecottignies@outlook.com')
                ->to('jeremyDecottignies@outlook.com')
                ->replyTo($data['email'])                 // le visiteur
                ->subject('[Portfolio] ' . $data['sujet'])
                ->text(
                    "Nom : {$data['nom']}\n".
                    "Email : {$data['email']}\n\n".
                    "Message :\n{$data['message']}"
                );

            // Envoyer le mail
            $mailer->send($email);

            $this->addFlash('success', 'Merci pour votre message, je vous répondrai dès que possible.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}

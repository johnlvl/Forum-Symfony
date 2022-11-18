<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessagesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new Messages();

        $form = $this->createForm(MessagesType::class, $message);

        $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($message);
        $entityManager->flush();
    }

        return $this->render('message/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

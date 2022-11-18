<?php

namespace App\Controller;

use App\Entity\Messages;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageSendController extends AbstractController
{
    
    #[Route('/messagesend', name: 'app_message_send')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $messageSend = $doctrine->getRepository(Messages::class)->findAll();

        return $this->render('message_send/index.html.twig', [
            'messageSend' => $messageSend,
        ]);
    }
}

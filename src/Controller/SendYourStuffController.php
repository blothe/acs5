<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SendYourStuffController extends AbstractController
{
    /**
     * @Route("/SendYourStuff", name="send_your_stuff")
     */
    public function index()
    {
        return $this->render('send_your_stuff/index.html.twig', [
            'controller_name' => 'SendYourStuffController',
        ]);
    }
}

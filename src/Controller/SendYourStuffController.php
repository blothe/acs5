<?php

namespace App\Controller;

use App\Form\SendYourStuffType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SendYourStuffController extends AbstractController
{
    /**
     * @Route("/SendYourStuff", name="send_your_stuff")
     */
    public function index()
    {
        $form = $this->createForm(SendYourStuffType::class);

        return $this->render('send_your_stuff/index.html.twig', [
          'our_form' => $form,
          'our_form' => $form->createView()
        ]);
    }
}

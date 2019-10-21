<?php

namespace App\Controller;

use App\Form\SendYourStuffType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SendYourStuffController extends AbstractController
{
  /**
  * @Route("/", name="home")
  * @Route("/SendYourStuff", name="send_your_stuff")
  */
  public function form()
  {
    $form = $this->createForm(SendYourStuffType::class);

    return $this->render('send_your_stuff/form.html.twig', [
      'sys_form' => $form,
      'sys_form' => $form->createView()
    ]);
  }
}

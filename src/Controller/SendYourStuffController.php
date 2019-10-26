<?php

namespace App\Controller;

use App\Form\SendYourStuffType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Upload;

class SendYourStuffController extends AbstractController
{
  /**
  * @Route("/", name="home")
  * @Route("/SendYourStuff", name="send_your_stuff")
  */
  public function form(Request $request)
  {
    $upload = new Upload();
    $upload-> setCreatedAt(new \DateTime());

    $form = $this->createForm(SendYourStuffType::class, $upload);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $upload = $form->getData();

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($upload);
      $entityManager->flush();

      return $this->redirectToRoute('home');
    }

    return $this->render('send_your_stuff/form.html.twig', [
      'sys_form' => $form,
      'sys_form' => $form->createView()
    ]);
  }
}

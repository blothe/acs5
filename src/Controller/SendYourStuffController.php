<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\SendYourStuffType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SendYourStuffController extends AbstractController
{
  /**
  * @Route("/", name="home")
  * @Route("/SendYourStuff", name="send_your_stuff")
  */
  public function form(Request $request)
  {
    $upload = new Upload();
    $upload->setCreatedAt(new \DateTime());

    $form = $this->createForm(SendYourStuffType::class, $upload);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $attachment = $form['attachment']->getData();
      $origAttachmentName = pathinfo($attachment->getClientOriginalName(), PATHINFO_FILENAME);
      $safeAttachmentName = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $origAttachmentName);
      $uniqAttachmentName = 'attachment_'.uniqid().'-'.$safeAttachmentName.'.'.$attachment->guessExtension();

      try {
        $attachment->move(
          $this->getParameter('upload_directory'),
          $uniqAttachmentName
        );
      }
      catch (FileException $e) {
        //
      }

      $upload = $form->getData();
      $upload->setAttachment($uniqAttachmentName);

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

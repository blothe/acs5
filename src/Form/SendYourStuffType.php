<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendYourStuffType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('sender_name', TextType::class, [
        'label' => 'From',
        'attr' => [
          'placeholder' => 'John Doe'
        ]
      ])
      ->add('sender_email', EmailType::class, [
        'label' => 'Email',
        'attr' => [
          'placeholder' => 'john.doe@example.com'
        ]
      ])
      ->add('recipient_name', TextType::class, [
        'label' => 'To',
        'attr' => [
          'placeholder' => 'Jane Doe'
        ]
      ])
      ->add('recipient_email', EmailType::class, [
        'label' => 'Email',
        'attr' => [
          'placeholder' => 'jane.doe@example.com'
        ]
      ])
      ->add('attachment', FileType::class)
      ->add('message', TextareaType::class, [
        'attr' => [
          'placeholder' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'
        ]
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      // Configure your form options here
    ]);
  }
}

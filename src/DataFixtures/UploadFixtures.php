<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Upload;

class UploadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {
          $upload = new Upload();
          $upload->setSenderName("Sender Name #$i")
                 ->setSenderEmail("sender.email.$i@example.com")
                 ->setRecipientName("Recipient Name #$i")
                 ->setRecipientEmail("recipient.email.$i@example.com")
                 ->setAttachment("File #$i.zip")
                 ->setMessage("Hey ! It's test message #$i :)")
                 ->setCreatedAt(new \DateTime());

          $manager->persist($upload);
        }

        $manager->flush();
    }
}

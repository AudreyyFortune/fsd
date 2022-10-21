<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailService {

    public function __construct(private MailerInterface $mailer) {}

    public function sendEmail($to, $subject, $content): void
    {
        $email = (new Email())
            ->from('audrey.3wa.noreply@gmail.com')
            ->to($to)
            ->subject($subject)
            ->text($content);

        $this->mailer->send($email);
    }

}
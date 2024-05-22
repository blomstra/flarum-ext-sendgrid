<?php

namespace Blomstra\FlarumSendGrid;

use Blomstra\FlarumSendGrid\Models\SendGridMessage;
use Illuminate\Mail\Transport\Transport;
use SendGrid;
use SendGrid\Mail\Mail;
use SendGrid\Response;
use Swift_Mime_SimpleMessage;

class SendGridTransport extends Transport
{
    private SendGrid $client;

    private array $from;

    public function __construct(SendGrid $client, array $from)
    {
        $this->client = $client;
        $this->from = $from;
    }

    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        try {
            $response = $this->client->send(
                $this->toSendGridMail($message)
            );

            $this->persistSendGridResponse($response);

            return $response;
        } catch (\Exception $e) {
            echo 'Caught exception: '.$e->getMessage()."\n";
        }

        return 1;
    }

    private function toSendGridMail(Swift_Mime_SimpleMessage $message): Mail
    {
        $mail = new Mail();

        $mail->setSubject($message->getSubject());

        $this->setFrom($mail);

        foreach ($message->getTo() as $email => $name) {
            $mail->addTo($email);
        }

        foreach ($message->getCc() as $email => $name) {
            $mail->addCc($email, $name);
        }

        foreach ($message->getBcc() as $email => $name) {
            $mail->addCc($email, $name);
        }

        $mail->addContent($message->getContentType(), $message->getBody());

        return $mail;
    }

    private function setFrom(Mail $mail)
    {
        [$email, $name] = $this->from;

        $mail->setFrom($email, $name);
    }

    private function persistSendGridResponse(Response $response)
    {
        SendGridMessage::create([
            'external_id' => $response->headers($assoc = true)['X-Message-Id'],
        ]);
    }
}

<?php

namespace Blomstra\FlarumSendGrid;

use Illuminate\Mail\Transport\Transport;
use SendGrid;
use SendGrid\Mail\Mail;
use Swift_Events_EventListener;
use Swift_Mime_SimpleMessage;

class SendGridTransport extends Transport
{
    private SendGrid $client;

    public function __construct(SendGrid $client)
    {
        $this->client = $client;
    }

    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        try {
            $response = $this->client->send(
                $this->toSendGridMail($message)
            );

            print $response->statusCode() . "\n";

            print $response->body() . "\n";
        } catch (\Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        return 1;
    }

    private function getFrom(Swift_Mime_SimpleMessage $message): array
    {
        $from = $message->getFrom();

        return [
            $email = array_keys($from)[0],
            $name = array_values($from)[0],
        ];
    }

    private function toSendGridMail(Swift_Mime_SimpleMessage $message): Mail
    {
        $email = new Mail();

        [$email, $name] = $this->getFrom($message);

        $email->setFrom($email, $name);

        $email->setSubject($message->getSubject());

        $email->addTo("jaggy@hey.com", "Jaggy Gauran");

        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");

        $email->addContent(
            $message->getContentType(),
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );

        return $email;
    }
}

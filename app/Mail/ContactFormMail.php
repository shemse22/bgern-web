<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $senderName;
    public string $senderEmail;
    public string $messageBody;

    public function __construct(string $senderName, string $senderEmail, string $messageBody)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission - Bgern')
            ->replyTo($this->senderEmail, $this->senderName)
            ->view('emails.contact');
    }
}
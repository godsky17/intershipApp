<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcceptedIntershipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $periode = "21/02/25 au 21/09/25";
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $name, $periode, $password)
    {
        $this->email =  $email;
        $this->name =  $name;
        $this->password =  $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Accepted Intership Mail',
            to : $this->email,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.intership.accepted',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

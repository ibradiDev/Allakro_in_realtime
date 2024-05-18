<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AllakroEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $autor;
    public $requestMessage;
    public $responseMessage;
    /**
     * Create a new message instance.
     */
    public function __construct(string|null $autor, string|null $requestMessage, string $responseMessage)
    {
        $this->autor = $autor;
        $this->requestMessage = $requestMessage;
        $this->responseMessage = $responseMessage;
    }

    /* public function build()
    {
        return $this->subject('Allakro Info')
            ->view('messages.email');
    } */

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Allakro Infos',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'messages.email',
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
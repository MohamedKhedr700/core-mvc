<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Reset password link.
     */
    private string $link;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->link = front_url('reset_password', $data['email'].'/'.$data['token']);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('forgot_password_mail'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.forgot-password.send-forgot-password-link',
            with: $this->getData(),
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Get email data.
     */
    public function getData(): array
    {
        return [
            'link' => $this->link,
        ];
    }
}

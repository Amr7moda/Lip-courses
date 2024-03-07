<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $formType;

    public function __construct($formData, $formType)
    {
        $this->formData = $formData;
        $this->formType = $formType;
    }

    public function build()
    {
        $subject = ($this->formType == 'student') ? 'New Student Form Submission' : 'New Instructor Form Submission';

        return $this->subject($subject)->view('emails.apply');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Form Submission',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.apply',
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

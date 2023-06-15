<?php

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoFactura extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $detalleVentaList;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $detallevent)
    {
        $this->subject = $subject;
        $this->detalleVentaList=$detallevent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subject);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'factura.factura',
            with: [
                'nombre' => 'Luis Cabrera Benito',
                'detalleVentaList' => $this->detalleVentaList,
            ],
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

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

      /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gui.testmail2022@gmail.com', 'SLUK Chamber')
            ->subject('SLUK Chamber')
            ->markdown('emails.contact_email');
    }
}

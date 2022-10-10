<?php

namespace Meraki\Ticket\Domain\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Meraki\Ticket\Domain\Models\TicketReply;

class TicketRepliedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  \Meraki\Ticket\Domain\Models\Ticket  $ticket
     * @return void
     */
    public function __construct(
        public Ticket $ticket,
        public TicketReply $reply
    )
    {
        $this->afterCommit();

        // $this->onQueue('ticket_replied_mail');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->ticket->subject)
                    ->markdown('emails.tickets.replied', [
                        'url' => 'http://www.google.com'
                    ]);
    }
}

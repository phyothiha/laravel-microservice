<?php

namespace Meraki\Ticket\Domain\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Foundations\Domain\BaseService;
use Symfony\Component\HttpFoundation\Response;
use Meraki\Ticket\Domain\Mail\TicketRepliedMail;
use Meraki\Ticket\Domain\Models\TicketReply;
use Meraki\Ticket\Infrastructure\Repositories\TicketReplyRepository;
use Meraki\Ticket\Infrastructure\Repositories\TicketRepository;
use Meraki\User\Infrastructure\Repositories\UserRepository;

class TicketReplyService extends BaseService
{
    public function __construct(
        protected TicketRepository $ticketRepository,
        protected TicketReplyRepository $ticketReplyRepository,
        protected UserRepository $userRepository,
    ) {
        //
    }

    // protected function sendMail(
    //     Ticket $ticket,
    //     TicketReply $reply,
    //     string $email,
    //     array $cc = [],
    //     array $bcc = []
    // )
    // {
    //     Mail::to($email)
    //         ->cc($cc)
    //         ->bcc($bcc)
    //         ->send(
    //             new TicketRepliedMail($ticket, $reply)
    //         );
    // }

    public function getAll(int $ticket_id)
    {
        return $this->ticketReplyRepository->selectAllByRelation($ticket_id);
    }

    public function create(array $inputs, int $ticket_id)
    {
        $inputs['user_id'] = $this->getUserId();
        $inputs['ticket_id'] = $ticket_id;

        return $this->ticketReplyRepository->insert($inputs);
    }

    public function delete(int $reply_id)
    {
        // user can delete his own comments
        $this->ticketReplyRepository->deleteById($reply_id);
    }

    // public function create(array $inputs, Ticket $ticket, array $cc_emails = [])
    // {
    //     $inputs['user_id'] = $this->getUserId();
    //     $inputs['ticket_id'] = $ticket->id;
    //     $cc = $cc_emails['cc'] ?? [];
    //     $bcc = $cc_emails['bcc'] ?? [];

    //     try {
    //         return DB::transaction(function () use ($inputs, $ticket, $cc, $bcc) {
    //             $reply = $this->ticketReplyRepository
    //                             ->insert($inputs);

    //             // if ($this->doesUserHasCustomerRole()) {
    //             //     $this->sendMail($ticket, $reply, $reply->ticket->agent->email, $cc, $bcc);
    //             // } else {
    //             //     $this->sendMail($ticket, $reply, $reply->ticket->customer->email, $cc, $bcc);
    //             // }

    //             return $reply->fresh();
    //         });
    //     } catch (\Exception $e) {
    //         abort(Response::HTTP_BAD_REQUEST, $e);
    //     }
    // }
}

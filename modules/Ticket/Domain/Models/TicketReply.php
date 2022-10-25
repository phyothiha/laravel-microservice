<?php

namespace Meraki\Ticket\Domain\Models;

use Meraki\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketReply extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'content',
    ];

    protected $with = ['user'];

    /**
     * Eloquent: Relationships
     *
     * @link https://laravel.com/docs/8.x/eloquent-relationships
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

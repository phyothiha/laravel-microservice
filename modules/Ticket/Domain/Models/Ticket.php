<?php

namespace Meraki\Ticket\Domain\Models;

use Illuminate\Support\Str;
use Meraki\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Meraki\Ticket\Domain\Models\TicketReply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Meraki\Ticket\Infrastructure\Database\Factories\TicketFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subject',
        'description',
        'type',
        'status',
        'priority',
        'customer_id',
        'agent_id',
    ];

    protected $with = ['customer', 'agent'];

    protected static function newFactory()
    {
        return TicketFactory::new();
    }

    /**
     * Eloquent: Relationships
     *
     * @link https://laravel.com/docs/8.x/eloquent-relationships
     */
    public function replies()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /**
     * Eloquent: Mutators & Casting
     *
     * @link https://laravel.com/docs/8.x/eloquent-mutators
     */
    protected function getName($name)
    {
        return Str::ucfirst(
            Str::replace('_', ' ', $name)
        );
    }

    public function getTypeNameAttribute()
    {
        $types = config('ticket.type');

        foreach ($types as $name => $value) {
            if ($this->type == $value) {
                return $this->getName($name);
            }
        }
    }

    public function getStatusNameAttribute()
    {
        $statuses = config('ticket.status');

        foreach ($statuses as $name => $value) {
            if ($this->status == $value) {
                return $this->getName($name);
            }
        }
    }

    public function getPriorityNameAttribute()
    {
        $priorities = config('ticket.priority');

        foreach ($priorities as $name => $value) {
            if ($this->priority == $value) {
                return $this->getName($name);
            }
        }
    }

    // public function attachments()
    // {
    //     return $this->morphMany(Attachment::class, 'attachable');
    // }
}

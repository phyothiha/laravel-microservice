<?php

namespace Meraki\User\Domain\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Meraki\Ticket\Domain\Models\Ticket;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Meraki\Ticket\Domain\Models\TicketReply;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Meraki\UserGroup\Domain\Models\UserGroup;
use Meraki\User\Infrastructure\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'username',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'job_title',
        'work_number',
        'mobile_number',
        'time_zone',
        'language',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = ['full_name'];

    // public function attachments()
    // {
    //     return $this->morphMany(Attachment::class, 'attachable');
    // }

    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'taggable');
    // }

    // public function metadata()
    // {
    //     return $this->hasMany(UserMetadata::class, 'user_id');
    // }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function ticket_replies()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function user_group()
    {
        return $this->belongsTo(UserGroup::class);
    }

    // Get the user's full name.
    public function getFullNameAttribute(): string
    {
        return preg_replace(
            '/\s+/',
            ' ',
            sprintf("%s %s %s", $this->first_name, $this->middle_name, $this->last_name)
        );
    }

    // Scope a query to only include users of a given time zones.
    public function scopeOfFilterByTimeZone(Builder $query, array $time_zones)
    {
        return $query->where(function ($query) use ($time_zones) {
            foreach ($time_zones as $time_zone) {
                $query->orWhere('time_zone', $time_zone);
            }
        });
    }

    // Scope a query to only include users of a given from, to date string.
    public function scopeOfFilterByDateRange(Builder $query, string $from, string $to)
    {
        return $query->whereDate('created_at', '>=', $from)
                     ->whereDate('created_at', '<=', $to);
    }

    // Scope a query to only include users of a given role.
    public function scopeOfFilterByRole(Builder $query, string $role)
    {
        return $query->whereHas('roles', function (Builder $query) use ($role) {
            return $query->where('name', $role);
        });
    }

    //  Scope a query to only include a given user of a given role.
    public function scopeOfSearchByRole(Builder $query, string $name, string $role)
    {
        return $query->selectRaw('users.*, CONCAT_WS(" ", first_name, middle_name, last_name) AS full_name')
                    ->ofFilterByRole($role)
                    ->having('full_name', 'like', $name . '%');
    }

    public function isCustomer()
    {
        return $this->hasRole('customer');
    }

    public function isAgent()
    {
        return $this->hasRole('agent');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}

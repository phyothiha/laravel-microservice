<?php

namespace Meraki\UserGroup\Domain\Models;

use Meraki\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'note',
        // Business Domain Columns
        'domains',
        'health',
        'tier',
        'industry',
        'subscribed_at',
        'expired_at',
        'renewed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'expired_at' => 'datetime',
        'renewed_at' => 'datetime',
    ];

    // protected static function newFactory()
    // {
    //     return ModelFactory::new();
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

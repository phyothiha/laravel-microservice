<?php

namespace Meraki\Solution\Domain\Models;

use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Meraki\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory, SoftDeletes, HasTags;

    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id',
        'tags',
    ];

    protected $with = ['user'];

    // protected static function newFactory()
    // {
    //     return SolutionFactory::new();
    // }

    /**
     * Eloquent: Relationships
     *
     * @link https://laravel.com/docs/8.x/eloquent-relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getStatusNameAttribute()
    {
        $statuses = config('solution.status');

        foreach ($statuses as $status_name => $status_number) {
            if ($this->status == $status_number) {
                return $this->getName($status_name);
            }
        }
    }
}

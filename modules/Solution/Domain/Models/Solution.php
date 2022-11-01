<?php

namespace Meraki\Solution\Domain\Models;

use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Meraki\Tag\Domain\Models\Tag;
use Meraki\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Meraki\Attachment\Domain\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Meraki\Solution\Infrastructure\Database\Factories\SolutionFactory;

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

    protected static function newFactory()
    {
        return SolutionFactory::new();
    }

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    public function tags()
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable', 'taggables', null, 'tag_id')
            ->orderBy('order_column');
    }

    /**
     * Eloquent: Relationships
     *
     * @link https://laravel.com/docs/8.x/eloquent-relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
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

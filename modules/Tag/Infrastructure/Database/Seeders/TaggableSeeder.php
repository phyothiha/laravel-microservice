<?php

namespace Meraki\Tag\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Meraki\Tag\Domain\Models\Tag;
use Meraki\Ticket\Domain\Models\Ticket;
use Meraki\Solution\Domain\Models\Solution;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limited_tags = Tag::limit(10)->get()->pluck('name');
        $tags = $limited_tags->random(rand(1, 5));

        foreach (range(1, 50) as $i) {
            if (rand(0, 5)) {
                $ticket = Ticket::find(rand(1, 5));
                $ticket->attachTags($tags);
            } else {
                $solution = Solution::find(rand(1, 5));
                $solution->attachTags($tags);
            }
        }
    }
}

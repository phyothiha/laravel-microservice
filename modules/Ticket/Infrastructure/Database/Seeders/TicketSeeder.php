<?php

namespace Meraki\Ticket\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Meraki\Ticket\Domain\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::factory()->count(50)->create();
    }
}

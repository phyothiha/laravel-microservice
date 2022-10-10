<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Meraki\User\Infrastructure\Database\Seeders\UserSeeder;
use Meraki\Ticket\Infrastructure\Database\Seeders\TicketSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            TicketSeeder::class,
        ]);
    }
}

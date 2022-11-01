<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Meraki\Tag\Infrastructure\Database\Seeders\TagSeeder;
use Meraki\User\Infrastructure\Database\Seeders\UserSeeder;
use Meraki\Tag\Infrastructure\Database\Seeders\TaggableSeeder;
use Meraki\Ticket\Infrastructure\Database\Seeders\TicketSeeder;
use Meraki\Solution\Infrastructure\Database\Seeders\SolutionSeeder;

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
            TagSeeder::class,
            SolutionSeeder::class,
            TaggableSeeder::class,
        ]);
    }
}
